#!/bin/bash
echo "Parse >>>"
LIST=`find . -iname "*.php"`
/usr/bin/xgettext --keyword=__ --language=PHP $LIST --from-code=UTF-8 --no-location --no-wrap -o ./languages/lisette-cost-calculator.pot
echo "Complete"
