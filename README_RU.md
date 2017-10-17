README.md

WordPress plugin - Lisette-cost-calculator.
Author: Sergey Morozov <sergmoro11@ya.ru>.

Установка
---------

1. Распаковать архив в папку /wp-content/plugins/
2. В административной панели активировать плагин - Lisette-cost-calculator.
3. Создать страницу и вставить short-code - [cost_calculator].

Настройка
---------

1. Цены, названия на кнопках, файлы изображений на кнопках можно менять
   в файле /wp-content/plugins/lisette-cost-calculator/config/questionnaire.php.
2. Можно добавлять новые пункты для выбора.
   Например можно добавить средний возраст:
   ...
   'question' => 'Возраст',
      'answers' => [
         ['caption' => 'Взрослый', 'image' => 'men.jpg', 'value' => '*1'],
         ['caption' => 'Средний', 'image' => 'middle.jpg', 'value' => '*1.1'],
         ['caption' => 'Ребенок', 'image' => 'child.jpg', 'value' => '*1.3'],
       ],
   
   Если параметр value - число, то оно добавляется к общей сумме.
   Если число предваряется символом "*", то это коэффициент, на который умножается резудьтирующая сумма.
   
   В примере файл изображения - middle.jpg, должен быть создан и записан в каталог - 
   /wp-content/plugins/lisette-cost-calculator/img/.
3. Изображения можно менять, записывая новые под теми же именами. 
   Соответствие пунктов и имен файлов заданы в файле 
   /wp-content/plugins/lisette-cost-calculator/config/questionnaire.php.
   Можно сохранять файлы изображений под своими именами, но тогда нужно внести исправления
   в файл конфигурации.
4. Если текст на кнопке длинноват, можно уменьшить шрифт добавив параметр small:
   ...
   'question' => 'Вид модели',
      'answers' => [
         ...
         ['caption' => 'с подъемным механизмом', 'image' => 'with-lifting.jpg', 'value' => 12000, 'small' => true],
       ],
5. Если в описании ответа не указан параметр image, пункт выводится без изображения.
   ...
   'question' => 'Ценовой класс',
      'answers' => [
         ['caption' => 'эконом', 'value' => '*1'],
