<?php
/**
 * @author - Sergey Morozov <sergmoro1@ya.ru>
 * @license - MIT
 * 
 * Prepare and show questionnaire of cost calculator.
 * Displays a tree of questions. 
 * Each question can have any number of possible answers. 
 * Each answer has a weight in the final cost of the product either absolute or as a coefficient. 
 * See /config/questionnaire.php as an example.
 * After filled in form results can be shown.
 * 
 */

class LisetteCCApplication
{
    private $name = 'questionnaire'; // file name of a questionnaire
    private static $questionnaire; // questions and answers
    // java script messages - key => value array where value part should have translated version in a language domain
    private static $js_messages = ['selectAllOptions' => 'Select all options, please.'];
    private $keys; // $_POST keys
    private $values; // $_POST values
    private $sum = 0; // order sum
    private $coeff = 1; // total order coefficient

    /* 
     * Initialization,
     * add hooks and filters.
     */
    public function __construct($param) {
        if ( !is_admin() ) {
            $this->name = $param['name'];
            // load css & scripts
            add_action( 'wp_enqueue_scripts', [ $this, 'load_plugin_css_scripts' ] );
            add_action( 'plugins_loaded', [ $this, 'plugins_loaded'] );
            
            // register shortcode
            add_shortcode('cost_calculator', [$this, 'cost_calculator_handler']);
        }
    }

    /*
     * Load language
     */
    public function plugins_loaded() {
        // load translator
        load_plugin_textdomain( 'lcc', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
        // load & translate questionnaire
        self::$questionnaire = require(dirname(__FILE__) . '/config/' . $this->name . '.php');
     }

    /*
     * Load css & js.
     */
    public function load_plugin_css_scripts() {
        // CSS
        wp_enqueue_style( 'lisette-cost-calculator', plugins_url( 'css/style.css', __FILE__ ));
        wp_enqueue_style( 'fixed-box', plugins_url( 'css/fixed.css', __FILE__ ));
        // register JS scripts
        wp_register_script( 'lisette-cost-calculator', plugins_url( 'js/main.js', __FILE__ ), ['jquery-core'] );
        wp_register_script( 'fixed-box', plugins_url( 'js/fixed.js', __FILE__ ), ['jquery-core'] );
        // translate JS messages (should placed after script)
        array_walk( self::$js_messages, function(&$v) { $v = __($v, 'lcc'); } );
        // place variables before script lisette-cost-calculator
        wp_localize_script( 'lisette-cost-calculator', 'lcc_message', self::$js_messages );
        // load scripts
        wp_enqueue_script( 'lisette-cost-calculator' );
        wp_enqueue_script( 'fixed-box' );
    }
    
    /*
     * Show form with questionnaire.
     * @param $atts an associative array of attributes, or an empty string if no attributes are given
     */
    public function cost_calculator_handler($atts = '') {
        // show result if exists
        $out = $this->get_results();
        // show questionnaire
        $out .= '<div id="cost-calculator">';
        $out .= '<form id="questionnaire-form" action="#" method="post">';
        $out .= $this->show(self::$questionnaire['items']);
        $out .= '<div class="error"></div>';
        $out .= '<input type="submit" value="'. __('Calculate', 'lcc') .'" class="btn-calculate">';
        $out .= '</form>';
        $out .= '</div>';
        return $out;
    }

    /*
     * Get results of filling in form.
     */
    public function get_results() {
        $out = '<div id="results">';
        // if form filled in
        if(isset($_POST['what'])) {
            $this->keys = array_keys($_POST);
            $this->values = array_values($_POST);
            // title
            $out .= '<h2>'. __('Results', 'lcc') .'</h2>';
            
            $out .= $this->answer(0, self::$questionnaire);

            // total sum
            $total = $this->sum * $this->coeff;
            $out .= '<hr>';
            $out .= '<h3 class="total">'. __('Total', 'lcc') .' = ' . $total . '</h3>';
            $out .= '<hr>';
        }
        $out .= '</div>';
        return $out;
    }

    /*
     * Get question: answer pair.
     * @param $i integer current index in $key, $value
     * @param $level array tail of questionnaire 
     */
    public function answer($i, $level) {
        if(!isset($level['items']))
            return '';
        $key = $this->keys[$i];
        $value = $this->values[$i];
        $out = '<ul>';
        $j = $i;
        while($j < count($this->keys)) {
            $choice = $level['items'][$this->keys[$j]];
            // question: answer
            if($choice['question'])
                $out .= '<li>'. 
                    $choice['question'] . ': ' .
                    $choice['answers'][$this->values[$j]]['caption'] .
                '</li>';
            // calculate sum and keep coefficient
            $v = $choice['answers'][$this->values[$j]]['value'];
            if(substr($v, 0, 1) == '*')
                $this->coeff *= substr($v, 1);
            else
                $this->sum += $v;
            // if next level of questionnaire exists then keep make output
            if(isset($level['items'])) {
                $out .= $this->answer($j, $level['items'][$this->keys[$j]]['answers'][$this->values[$j]]);
            }
            $j++;
        }
        $out .= '</ul>';
        return $out;
    }

    /*
     * Show questionnaire - questions and possible answers.
     * @param $items array questionnaire (see /config/questionnaire.php)
     */
    public function show($items) {
        $out = '';
        foreach($items as $var => $item) {
            $out .= '<div id="'. $var .'" class="question-answers">';
            $out .= '<h3>'. $item['question'] .'</h3>';
            // first - show all inputs
            $i = 0; $value = [];
            foreach($item['answers'] as $answer) {
                $value[$i] = isset($answer['value']) 
                    ? $answer['value'] 
                    : 0;
                $caption = isset($answer['small']) && $answer['small']
                    ? '<small>' . $answer['caption'] . '</small>'
                    : $answer['caption'];
                $out .= isset($answer['image'])
                    ? $this->option($var, $i, $value[$i], $answer['image'], $caption)
                    : '<label class="option"><input type="radio" name="'. $var .'" value="'. $i .'" data-value="'. $value[$i] .'" data-index="'. $i .'"> '. $caption . '</label>';
                $i++;
            }

            //second - recursively show dependent block if exist
            $i = 0;
            foreach($item['answers'] as $answer) {
                if(isset($answer['items']))
                    $out .= '<div id="'. $var . '-' . $i .'" class="dependent">' . $this->show($answer['items']) .'</div>';
                $i++;
            } 
            $out .= '</div>';
        }
        return $out;
    }

    /*
     * Make complex radio input with image and check buttons under it.
     * @param $var variable name
     * @param $i variable index in $items of questionnaire
     * @param $value 0 or item cost or coefficient of increasing of total sum
     *     in last case it looks like *1.4
     * @param $image url to item image 
     * @param $caption item caption
     */
    public function option($var, $i, $value, $image, $caption) {
        return 
        '<div class="type-block">'.
            '<label>'.
                '<input name="'. $var .'" value="'. $i .'" type="radio" data-value="'. $value .'" data-index="'. $i .'">'.
                '<div class="type-img" style="background-image:url('. plugin_dir_url( __FILE__ ) .'img/'. $image .')"></div>'.
                '<div class="type-label">'. $caption .'</div>'.
            '</label>'.
        '</div>';
    }
}
