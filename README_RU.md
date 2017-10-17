Установка
---------

1. Распаковать архив в папку <code>/wp-content/plugins/</code>.
2. В административной панели активировать плагин - Lisette-cost-calculator.
3. Создать страницу и вставить short-code - <code>[cost_calculator]</code>.

Настройка
---------

1. Цены, названия на кнопках, файлы изображений на кнопках можно менять
   в файле <code>/wp-content/plugins/lisette-cost-calculator/config/questionnaire.php</code>.
2. Можно добавлять новые пункты для выбора. Например можно добавить средний возраст:
   <pre>
   'question' => 'Возраст',
      'answers' => [
         ['caption' => 'Взрослый', 'image' => 'men.jpg', 'value' => '*1'],
         ['caption' => 'Средний', 'image' => 'teenage.jpg', 'value' => '*1.1'],
         ['caption' => 'Ребенок', 'image' => 'child.jpg', 'value' => '*1.3'],
       ],
   </pre>   
   Если параметр <code>value</code> - число, то оно добавляется к общей сумме.
   Если число предваряется символом "*", то это коэффициент, на который умножается резудьтирующая сумма.
   В примере файл изображения <code>teenage.jpg</code>, должен быть создан и записан в каталог - 
   <code>/wp-content/plugins/lisette-cost-calculator/img/</code>.
3. Изображения можно менять, записывая новые под теми же именами. 
   Соответствие пунктов и имен файлов заданы в файле 
   <code>/wp-content/plugins/lisette-cost-calculator/config/questionnaire.php</code>.
   Можно сохранять файлы изображений под своими именами, но тогда нужно внести исправления
   в файл конфигурации.
4. Если текст на кнопке длинноват, можно уменьшить шрифт добавив параметр <code>small</code>:
   <pre>
   'question' => 'Вид модели',
      'answers' => [
         [
           'caption' => 'с подъемным механизмом', 
           'image' => 'with-lifting.jpg', 
           'value' => 12000, 
           'small' => true],
       ],
   </pre>       
5. Если в описании ответа не указан параметр image, пункт выводится без изображения.
   <pre>
   'question' => 'Ценовой класс',
      'answers' => [
         ['caption' => 'эконом', 'value' => '*1'],
         ['caption' => 'элит', 'value' => '*2'],
   </pre>
