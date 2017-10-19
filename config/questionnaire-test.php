<?php
return ['items' => [
  'what' => [
    'question' => __('What do you choose?', 'lcc'),
    'answers' => [
      ['caption' => __('Bed', 'lcc'), 'image' => 'bed.jpg', 'items' => [
        'age' => [
          'question' => __('Age', 'lcc'),
          'answers' => [
            [
              'caption' => __('Adult', 'lcc'), 
              'image' => 'men.jpg', 
              'value' => '*1',
            ],
            [
              'caption' => __('Child', 'lcc'), 
              'image' => 'child.jpg', 
              'value' => '*1.3',
            ],
          ],
        ],
        'capacity' => [
          'question' => __('Size', 'lcc'),
          'answers' => [
            [
              'caption' => __('one person bed', 'lcc'), 
              'image' => 'bed1.jpg', 
              'value' => 5000,
              'items' => ['header' => ['question' => __('Storage for bedding', 'lcc'), 'answers' => [
				['caption' => 'standard', 'image' => 'head-ordinary.jpg', 'value' => 0],
				['caption' => 'with-storage', 'image' => 'head-storage.jpg', 'value' => 1500],
			  ]]],
            ],
            [
              'caption' => __('double', 'lcc'), 
              'image' => 'bed2.jpg', 
              'value' => 11000,
              'items' => ['header' => ['question' => __('Headboard', 'lcc'), 'answers' => [
				['caption' => __('standard', 'lcc'), 'image' => 'head-ordinary-2.jpg', 'value' => 500],
				['caption' => __('design', 'lcc'), 'image' => 'head-design-2.jpg', 'value' => 2550],
			  ]]],
            ],
          ],
        ],
      ],], // Bed
      ['caption' => __('Sofa', 'lcc'), 'image' => 'sofa.jpg', 'items' => [
        'age' => [
          'question' => __('Age', 'lcc'),
          'answers' => [
            [
              'caption' => __('Adult', 'lcc'), 
              'image' => 'men.jpg', 
              'value' => '*1',
            ],
            [
              'caption' => __('Child', 'lcc'), 
              'image' => 'child.jpg', 
              'value' => '*1.3',
            ],
          ],
        ],
        'form' => [
          'question' => __('Form', 'lcc'),
          'answers' => [
            [
              'caption' => __('straight', 'lcc'), 
              'image' => 'line.jpg', 
              'value' => 10000,
            ],
            [
              'caption' => __('corner', 'lcc'), 
              'image' => 'corner.jpg', 
              'value' => 15000,
            ],
          ],
        ],
      ],], // Sofa
    ],
  ],
]];
