<?php
$example_persons_array = [
    [
        'fullname' => 'Иванов Иван Иванович',
        'job' => 'tester',
    ],
    [
        'fullname' => 'Степанова Наталья Степановна',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Пащенко Владимир Александрович',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Громов Александр Иванович',
        'job' => 'fullstack-developer',
    ],
    [
        'fullname' => 'Славин Семён Сергеевич',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Цой Владимир Антонович',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Быстрая Юлия Сергеевна',
        'job' => 'PR-manager',
    ],
    [
        'fullname' => 'Шматко Антонина Сергеевна',
        'job' => 'HR-manager',
    ],
    [
        'fullname' => 'аль-Хорезми Мухаммад ибн-Муса',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Бардо Жаклин Фёдоровна',
        'job' => 'android-developer',
    ],
    [
        'fullname' => 'Шварцнегер Арнольд Густавович',
        'job' => 'babysitter',
    ],
];


function getFullnameFromParts($arg1, $arg2, $arg3) {
    $fullName = $arg1 . ' ' . $arg2 . ' ' . $arg3;
    return $fullName;
};

function getPartsFromFullname($arg1) {

    $fullname = ['surname' => '' ,'name' => '', 'patronomyc' => ''];
    $name = explode(" ", $arg1);
    $fullname['surname'] = $name[0];
    $fullname['name'] = $name[1];
    $fullname['patronomyc'] = $name[2];
    return $fullname;
};

function getShortName($arg1) {
    getPartsFromFullname($arg1);
    $short = $fullname['name'] . ' ' . $fullname[$surname[0]];
    return $short
};

function getGenderFromName($arg1) {

    getPartsFromFullname($arg1);
    $b = 0;
    $sex = 0;
    if($fullname[$surname[-1]] == 'а' && $fullname[$surname[-2]] == 'в') {
        $sex--;
    } if($fullname[$surname[-1]] == 'ч' && $fullname[$surname[-2]] == 'и'){
        $sex++;
    };
    if($fullname[$name[-1]] == 'а'){
        $sex--;
    } if($fullname[$name[-1]] == 'й' || $fullname[$name[-1]] == 'н') {
        $sex++;
    };
    if($fullname[$patronomyc[-1]] == 'а' && $fullname[$patronomyc[-2]] == 'н' && $fullname[$patronomyc[-3]] == 'в'){
        $sex--;
    } if($fullname[$patronomyc[-1]] == 'ч' && $fullname[$patronomyc[-2]] == 'и') {
        $sex++;
    };
    if($sex > 0){
        $b = 1;
    } if($sex < 0) {
        $b = -1;
    } else {
        $b = 0;
    };
    return $b;
}

function getGenderDescription($arg1){

    $i = 0;
    $maleGen = 0;
    $femaleGen = 0;
    $neutral = 0;

    while($i < count($arg1)){
        $i++;
        getGenderFromName($arg1);
        if($b == 1){
            $maleGen = $maleGen + 1;
        } if($b == -1) {
            $femaleGen = $femaleGen +1;
        } else {
            $neutral = $neutral + 1;
        }
    }

    $countmale = round((($maleGen\($maleGen + $femaleGen + $neutral))*100), 1);
    $countfemale = round((($femaleGen\($maleGen + $femaleGen + $neutral))*100), 1);
    $countneutral = round((($neutral\($maleGen + $femaleGen + $neutral))*100), 1); 

    echo ('Мужчины - ' .$countmale .'%');
    echo ('Женщины - ' .$countfemale .'%');
    echo ('Не удалось определить - ' .$countneutral .'%');

}

function getPerfectPartner($arg1, $arg2, $arg3, $array){

    getFullnameFromParts($arg1, $arg2, $arg3);
    $lowname = mb_strtolower($fullName);
    
    $gender = getGenderFromName($lowname);

    do {
        $person = $array[rand(0,count($array))];
        $gender2 = getGenderFromName($person);
    } while($gender != $gender2);

    $pers1 = getPartsFromFullname($lowname);
    $pers2 = getPartsFromFullname($person);

    $loverate = rand(50, 100);
    
    echo($pers1 .'+' . $pers2 .'= ♡ Идеально на' .$loverate .'% ♡');
}

?>

