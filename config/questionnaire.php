<?php
/**
 * @author - Sergey Morozov <sergmoro1@ya.ru>
 * @license - MIT
 *
 * Tree of questions & answers defined in $items.
 * Question can has any amount of answers have to defined in $answers.
 * Any answer can has $caption ($small), $image, $value and $items - if answer has own branch of questions & answers.
 * $caption string
 * $small wrap <small>$caption</small> if true (for long caption)
 * $image name of image in /img folder, all image should have the same sizes
 * $value absolute cost of answer or coefficient of total cost
 * $items branch questions & answers
 * 
 * Domain lcc mean lisette cost calculator.
 */
return ['items' => [
  'what' => [
    'question' => __('What do you choose?', 'lcc'),
    'answers' => [
      ['caption' => __('Bed', 'lcc'), 'image' => 'bed.jpg', 'items' => [
        'age' => [
          'question' => __('Age', 'lcc'),
          'answers' => [
            ['caption' => __('Adult', 'lcc'), 'image' => 'men.jpg', 'value' => '*1'],
            ['caption' => __('Child', 'lcc'), 'image' => 'child.jpg', 'value' => '*1.3'],
          ],
        ],
        'capacity' => [
          'question' => __('Size', 'lcc'),
          'answers' => [
            ['caption' => __('one person bed', 'lcc'), 'image' => 'bed1.jpg', 'value' => 5000],
            ['caption' => __('one & half', 'lcc'), 'image' => 'bed15.jpg', 'value' => 8000],
            ['caption' => __('double', 'lcc'), 'image' => 'bed2.jpg', 'value' => 11000],
          ],
        ],
        'view' => [
          'question' => __('Model', 'lcc'),
          'answers' => [
            ['caption' => __('transformer', 'lcc'), 'image' => 'transformer.jpg', 'value' => 40000],
            ['caption' => __('two-level', 'lcc'), 'image' => 'bunk.jpg', 'value' => 20000],
            ['caption' => __('loft', 'lcc'), 'image' => 'attic.jpg', 'value' => 18000],
            ['caption' => __('hovering', 'lcc'), 'image' => 'soaring.jpg', 'value' => 35000],
            ['caption' => __('built-in wardrobe', 'lcc'), 'image' => 'built-in.jpg', 'value' => 15000],
            ['caption' => __('with lifting mechanism', 'lcc'), 'image' => 'with-lifting.jpg', 'value' => 12000, 'small' => true],
          ],
        ],
          'form' => [
          'question' => __('Form', 'lcc'),
          'answers' => [
            ['caption' => __('square', 'lcc'), 'image' => 'quadrate.jpg', 'value' => 7000],
            ['caption' => __('rectangular', 'lcc'), 'image' => 'box.jpg', 'value' => 0],
            ['caption' => __('round', 'lcc'), 'image' => 'round.jpg', 'value' => 23000],
          ],
        ],
        'material' => [
          'question' => __('Material', 'lcc'),
          'answers' => [
            ['caption' => __('wood', 'lcc'), 'image' => 'wood.jpg', 'value' => 6000],
            ['caption' => __('veneer', 'lcc'), 'image' => 'veneer.jpg', 'value' => 5000],
            ['caption' => __('metal', 'lcc'), 'image' => 'metal.jpg', 'value' => 5000],
            ['caption' => __('chipboard', 'lcc'), 'image' => 'chipboard.jpg', 'value' => 4000, 'small' => true],
          ],
        ],
        'frame' => [
          'question' => __('Frame', 'lcc'),
          'answers' => [
            ['caption' => __('rake', 'lcc'), 'image' => 'rake.jpg', 'value' => 1000],
            ['caption' => __('mesh', 'lcc'), 'image' => 'mesh.jpg', 'value' => 2000, 'small' => true],
            ['caption' => __('flat', 'lcc'), 'image' => 'flat.jpg', 'value' => 3000],
            ['caption' => __('orthopedic', 'lcc'), 'image' => 'frame_orthopedic.jpg', 'value' => 15000],
          ],
        ],
        'mattress' => [
          'question' => __('Mattress', 'lcc'),
          'answers' => [
            ['caption' => __('with bonnel blocks', 'lcc'), 'image' => 'bonnel.jpg', 'value' => 10000, 'small' => true],
            ['caption' => __('independent springs', 'lcc'), 'image' => 'independent_springs.jpg', 'value' => 15000, 'small' => true],
            ['caption' => __('without springs', 'lcc'), 'image' => 'without_springs.jpg', 'value' => 0],
            ['caption' => __('orthopedic', 'lcc'), 'image' => 'mattress_orthopedic.jpg', 'value' => 20000],
          ],
        ],
        'class' => [
          'question' => __('Price class', 'lcc'),
          'answers' => [
            ['caption' => __('economy', 'lcc'), 'value' => '*1'],
            ['caption' => __('standard', 'lcc'), 'value' => '*1.5'],
            ['caption' => __('elite', 'lcc'), 'value' => '*2.5'],
          ],
        ],
      ],],
      ['caption' => __('Sofa', 'lcc'), 'image' => 'sofa.jpg', 'items' => [
        'age' => [
        'question' => __('Age', 'lcc'),
          'answers' => [
            ['caption' => __('Adult', 'lcc'), 'image' => 'men.jpg', 'value' => '*1'],
            ['caption' => __('Child', 'lcc'), 'image' => 'child.jpg', 'value' => '*1.3'],
          ],
        ],
        'form' => [
          'question' => __('Form', 'lcc'),
          'answers' => [
            ['caption' => __('straight', 'lcc'), 'image' => 'line.jpg', 'value' => 10000],
            ['caption' => __('corner', 'lcc'), 'image' => 'corner.jpg', 'value' => 15000],
            ['caption' => __('halfround', 'lcc'), 'image' => 'halfround.jpg', 'value' => 20000],
            ['caption' => __('modular', 'lcc'), 'image' => 'module.jpg', 'value' => 35000],
            ['caption' => __('п-shaped', 'lcc'), 'image' => 'p-shaped.jpg', 'value' => 40000],
          ],
        ],
        'trim' => [
          'question' => __('Upholstery', 'lcc'),
          'answers' => [
            ['caption' => __('leather', 'lcc'),'image' => 'leather.jpg', 'value' => 30000],
            ['caption' => __('leatherette', 'lcc'), 'image' => 'leatherette.jpg', 'value' => 10000],
            ['caption' => __('cotton', 'lcc'), 'image' => 'cotton.jpg', 'value' => 3000],
            ['caption' => __('jacquard', 'lcc'), 'image' => 'jacquard.jpg', 'value' => 6000],
            ['caption' => __('flock', 'lcc'), 'image' => 'flock.jpg', 'value' => 4000],
            ['caption' => __('silk', 'lcc'), 'image' => 'silk.jpg', 'value' => 8000],
            ['caption' => __('gobelin', 'lcc'), 'image' => 'gobelin.jpg', 'value' => 5000],
          ],
        ],
        'mechanism' => [
          'question' => __('Mechanism of sofa folding', 'lcc'),
          'answers' => [
            ['caption' => __('without mechanism', 'lcc'),'image' => 'without.jpg', 'value' => 0],
            ['caption' => __('book', 'lcc'), 'image' => 'book.jpg', 'value' => 4000],
            ['caption' => __('click-click', 'lcc'), 'image' => 'click.jpg', 'value' => 6000],
            ['caption' => __('accordion', 'lcc'), 'image' => 'accordion.jpg', 'value' => 5500],
            ['caption' => __('eurobook', 'lcc'), 'image' => 'eurobook.jpg', 'value' => 5000],
            ['caption' => __('roll-out', 'lcc'), 'image' => 'roll-out.jpg', 'value' => 3500],
            ['caption' => __('orthopedic mattress', 'lcc'), 'image' => 'mechanism_orthopedic.jpg', 'value' => 20000, 'small' => true],
          ],
        ],
        'class' => [
          'question' => __('Price class', 'lcc'),
          'answers' => [
            ['caption' => __('economy', 'lcc'), 'value' => '*1'],
            ['caption' => __('standard', 'lcc'), 'value' => '*1.5'],
            ['caption' => __('elite', 'lcc'), 'value' => '*2.5'],
          ],
        ],
      ],],
    ],
  ],
]];
