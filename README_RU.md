Описание
---------
Любой продукт состоит из элементов. 
Довольно часто производитель позволяет заранее подбирать комплектующие. 

Для этой цели должен быть визуальный вопросник. 
Этот плагин помогает просто определить такой вопросник.

Важно
---------
Плагин работает с темой "Twenty Fourteen". Он будет работать и с другими темами, но
некоторые изменения в файле <code>/css/fixed.css</code> могут понадобиться.

Установка
---------

1. Распаковать архив в папку <code>/wp-content/plugins/</code>.
2. В административной панели активировать плагин - Lisette-cost-calculator.
3. Создать страницу и вставить short-code - <code>[cost_calculator]</code>.

Настройка
---------

Цены, названия на кнопках, файлы изображений на кнопках можно менять в файле 
<code>/wp-content/plugins/lisette-cost-calculator/config/questionnaire-test.php</code>.

Файл вопросника может иметь любое имя. Поменяйте имя, при необходимости, в файле
<code>lisette-cost-calculator.php</code>.

<pre>
$application = new LisetteCCApplication([
  'name' => 'questionnaire'
]);
</pre>

Каждый вопрос может иметь ответы. Каждый ответ может иметьs: <code>caption</code>, <code>image</code>, <code>value</code>. 
Если параметр <code>value</code> является числом, то число добавляется к текущей сумме.

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

Если перед числом стоит символ "*", то это коэффициент на который умножается текущая сумма.

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
</pre>

Все картинки должны быть размещены в каталоге <code>/wp-content/plugins/lisette-cost-calculator/img/</code>.

Если ответ длинноват, можно установить параметр <code>small</code>:

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

Если параметр <code>image</code> не определен, кнопка выбора будет выведена без картнки.

<pre>
  'question' => 'Price class',
    'answers' => [
      ['caption' => 'econom', 'value' => '*1'],
      ['caption' => 'elite', 'value' => '*2'],
    ],
</pre>
