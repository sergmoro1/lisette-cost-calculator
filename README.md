Description
---------
Any product consists of elements. 
Quite often the manufacturer allows you to select the components in advance. 

For this goal should be a visual questionnaire. 
This plugin helps simply define such a questionnaire. 

Important
---------
Plugin works for Twenty Fourteen theme. It will work for others too but
some changes in a file <code>/css/fixed.css</code> can be needed.

Installation
---------

1. Unpack archive to folder <code>/wp-content/plugins/</code>.
2. Activate plagin <code>Lisette-cost-calculator</code>.
3. Add post or page and insert short-code - <code>[cost_calculator]</code>.

Settings & Explanations
---------

Price, captions, images can be changed in configuration file 
<code>/wp-content/plugins/lisette-cost-calculator/config/questionnaire-test.php</code>.
   
There may be any other name of a questionnaire file. In this case a new name should be set in a file
<code>lisette-cost-calculator.php</code>

<pre>
$application = new LisetteCCApplication([
  'name' => 'questionnaire'
]);
</pre>
   
Any question can has an answer. Any answer can has: <code>caption</code>, <code>image</code>, <code>value</code>. 
If parameter <code>value</code> is a number, then it will be added to total sum.

<pre>
'question' => 'Headboard', 
  'answers' => [
    [
      'caption' => 'standard',
      'image' => 'head-ordinary-2.jpg',
      'value' => 500,
    ],
    [
      'caption' => 'design',
      'image' => 'head-design-2.jpg',
      'value' => 2550,
    ],
  ],
</pre>

If befor number symbol "*" placed, then it is a coefficient.

<pre>
'question' => 'Age',
  'answers' => [
    [
      'caption' => 'Adult', 
      'image' => 'men.jpg', 
      'value' => '*1',
    ],
    [
      'caption' => 'Child', 
      'image' => 'child.jpg', 
      'value' => '*1.3',
    ],
  ],

All images should be placed in a folder _/wp-content/plugins/lisette-cost-calculator/img/_.

If caption too long add <code>small</code> parameter:

<pre>
  'question' => 'Model',
    'answers' => [
      [
        'caption' => 'with lifting mechanism', 
        'image' => 'with-lifting.jpg', 
        'value' => 230, 
        'small' => true,
      ],
    ],
</pre>

If parameter <code>image</code> is not specified, item will be printed without image.

<pre>
  'question' => 'Price class',
    'answers' => [
      ['caption' => 'econom', 'value' => '*1'],
      ['caption' => 'elite', 'value' => '*2'],
    ],
</pre>
