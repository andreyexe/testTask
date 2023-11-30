<?php

$text = <<<TXT
<p class="big">
	Год основания:<b>1589 г.</b> Волгоград отмечает день города в <b>2-е воскресенье сентября</b>. <br>В <b>2023 году</b> эта дата - <b>10 сентября</b>.
</p>
<p class="float">
	<img src="https://www.calend.ru/img/content_events/i0/961.jpg" alt="Волгоград" width="300" height="200" itemprop="image">
	<span class="caption gray">Скульптура «Родина-мать зовет!» входит в число семи чудес России (Фото: Art Konovalov, по лицензии shutterstock.com)</span>
</p>
<p>
	<i><b>Великая Отечественная война в истории города</b></i></p><p><i>Важнейшей операцией Советской Армии в Великой Отечественной войне стала <a href="https://www.calend.ru/holidays/0/0/1869/">Сталинградская битва</a>(17.07.1942 - 02.02.1943). Целью боевых действий советских войск являлись оборона  Сталинграда и разгром действовавшей на сталинградском направлении группировки противника. Победа советских войск в Сталинградской битве имела решающее значение для победы Советского Союза в Великой Отечественной войне.</i>
</p>
TXT;

$Max_words=29;
$Words_now=0;//количество слов

function Is_this_Word(string $str){
    if(preg_match('/</',$str))// если слово - это тег
        return false;
    if(preg_match('/[\wА-яЁё]+/',$str)){//чтобы слово состояло из букв (чтобы просто точка не принималась за слово)
        return true;
    }
    else{
        return  false;
    }
}
$text=preg_replace('/</',' <',$text);//добавляем пробел перед тегами, чтобы строка корректно разбивалась на слова
$array = explode('>', $text);
foreach ($array as $str):
    if(preg_match('/^\s*?<+/',$str))//если строка - это тег
    {
        print($str.'>');
    }
    else
    {
        $words=explode(' ',$str.'> ');//разбиваем строкуу на слова
        foreach ($words as $word):
            if(Is_this_Word($word))
            {
                if($Words_now<$Max_words-1)
                {
                    $Words_now++;
                    print($word. ' ');
                }
                else{
                    if($Words_now==$Max_words-1)
                    {
                        print($word. '...');
                        $Words_now++;
                    }
                }
            }
            else{
                if($Words_now<$Max_words)
                {
                    print($word. ' ');//это знаки препинания
                }
            }
        endforeach;
    }
endforeach;
