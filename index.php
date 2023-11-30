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


function Is_this_Word(string $str){
    if(preg_match('/</',$str))
    {
        // если слово - это тег
        return false;
    }
    if(preg_match('/[\wА-яЁё]+/',$str)){
        //чтобы слово состояло из букв (чтобы просто точка не принималась за слово)
        return true;
    }
    else{
        return  false;
    }
}
$text=preg_replace('/</',' <',$text);
//добавляем пробел перед тегами, чтобы строка корректно разбивалась на слова

$array = explode('>', $text);

$wordCount=0;//количество слов
for($i=0;$i<count($array);$i++)
{
    if(preg_match('/^\s*?<+/',$array[$i]))//если строка - это тег
    {
        print($array[$i].'>');
    }
    else
    {
        $words=explode(' ',$array[$i].'> ');//разбиваем строку на слова
        for($j=0;$j<count($words);$j++)
        {
            if(Is_this_Word($words[$j]))
            {
                if($wordCount<29)
                {
                    $wordCount++;
                    print($words[$j]. ' ');
                }
            }
            else{
                if($wordCount<29)
                {
                    print($words[$j]. ' ');//знаки препинания
                }
            }
        }

    }
}