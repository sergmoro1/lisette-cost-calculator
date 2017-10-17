Installation
---------

1. Unpack archive to folder <code>/wp-content/plugins/</code>
2. Activate plagin Lisette-cost-calculator.
3. Add post or page and insert short-code - <code>[cost_calculator]</code>.

Setup
---------

1. Price, captions, images can be changed in configuration file 
   <code>/wp-content/plugins/lisette-cost-calculator/config/questionnaire.php</code>.
2. New items can be added, for example teenage age:
   <pre>
   'question' => 'Age',
      'answers' => [
         ['caption' => 'Adult', 'image' => 'men.jpg', 'value' => '*1'],
         ['caption' => 'Teenage', 'image' => 'teenage.jpg', 'value' => '*1.1'],
         ['caption' => 'Child', 'image' => 'child.jpg', 'value' => '*1.3'],
       ],
   </pre>
   If parameter <code>value</code> is a number, then it will be added to total sum.
   If befor number symbol "*" placed, then it is a coefficient.
   All images should be placed in a folder <code>/wp-content/plugins/lisette-cost-calculator/img/</code>.
3. If caption too long add <code>small</code> parameter:
   <pre>
   'question' => 'Model',
      'answers' => [
         ['caption' => 'with lifting mechanism', 'image' => 'with-lifting.jpg', 'value' => 230, 'small' => true],
       ],
   </pre>
4. If parameter <code>image</code> is not specified, item will be printed without image.
   <pre>
   'question' => 'Price class',
      'answers' => [
         ['caption' => 'econom', 'value' => '*1'],
         ['caption' => 'elite', 'value' => '*2'],
    </pre>
