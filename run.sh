#!/bin/sh
#./run.sh > /dev/null 2>&1 &
php -S 0.0.0.0:80 > /dev/null 2>&1 &

while true
do
	php generate.php
	sleep 0.4
	if grep -Fxq "nick.jennett" show.txt #F9
	then
		xdotool key F9
		echo "" > show.txt
	elif grep -Fxq "adam.linscott" show.txt #F10
	then
		xdotool key F10
		echo "" > show.txt
	elif grep -Fxq "zachary.claretscott" show.txt #F8
	then
		xdotool key F8
		echo "" > show.txt
	elif grep -Fxq "camera" show.txt #F7
	then
		xdotool key F7
		echo "" > show.txt
	else
		echo "nothing"
	fi
done
