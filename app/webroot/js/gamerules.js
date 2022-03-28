//Создаем персонажей с определенными свойствами
Mia = { Name: "Mia", Speed: 6, Cost: 100, Luck: 1 };
Jack = { Name: "Jack", Speed: 3, Cost: 30, Luck: 1 };
Kate = { Name: "Kate", Speed: 4, Cost: 70, Luck: 1 };
William = { Name: "William", Speed: 5, Cost: 80, Luck: 1 };

//Задаем массив из персонажей после их назначения на работы
var Staff;

var Jobs = new Array(5);

//Создаем ведущую линию
Lead = { Duration: 800, Relation: -1, Position: 0, Value: 0, Step: 5, IsTriggered: false };

//Здесь получаем все элементы HTML-формы
var Taskbars = document.getElementsByClassName('taskbar');
var Progress = document.getElementsByClassName('progress');
var Leadline = document.getElementsByClassName('lead')[0];
var Label = document.getElementsByClassName('counter')[1];
var Gamestate = document.getElementById('state');
var test = document.getElementById('mark');
var Gamefield = document.getElementsByClassName('field')[0];
var Selectors = document.getElementsByTagName('select');

//Задаем игровые переменные
var cost = 0;
var budget = 21000;

document.getElementsByClassName('counter')[0].innerHTML = "Бюджет: " + budget + "$";

var proc;

var IsDefeat = false;

var count;
var idchance;
var idchar;

//Переменные для передачи в php
var isWon = '0';
var login = 'vecryd';


//Производим предварительную инициализацию игровых данных
window.onload = function Initialize() {    
    var r1 = getRandomInt(0, Jobs.length - 3);
    var r2 = getRandomInt(r1 + 1, Jobs.length - 2);
    var r3 = getRandomInt(r2 + 1, Jobs.length - 1);

    var dur1 = getRandomInt(1, 4);
    var dur2 = getRandomInt(1, (Lead.Duration / 100) - dur1 - 1) * 100;
    dur1 = dur1 * 100;
    var dur3 = Lead.Duration - (dur1 + dur2);

    Jobs[r1] = { Duration: dur1, Relation: -1, Position: 0, Value: 0, Step: 0, IsTriggered: false };
    Jobs[r2] = { Duration: dur2, Relation: r1, Position: 0, Value: 0, Step: 0, IsTriggered: false };
    Jobs[r3] = { Duration: dur3, Relation: r2, Position: 0, Value: 0, Step: 0, IsTriggered: false };


    for (var a = 0; a < Jobs.length; a++) {
        if (a != r1 && a != r2 && a != r3) {
            var dur = getRandomInt(1, 3) * 100;
            var pos = getRandomInt(Lead.Duration * 0.2, Lead.Duration * 0.5);
            Jobs[a] = { Duration: dur, Relation: -1, Position: pos, Value: 0, Step: 0, IsTriggered: false };
        }
    }

    for (var v = 0; v < Jobs.length; v++) {
        if (Jobs[v].Relation != -1) {
            Jobs[v].Position = Jobs[Jobs[v].Relation].Position + Jobs[Jobs[v].Relation].Duration;

            /*var el = document.createElement('div');
            el.className = "arrow";
            el.style.marginLeft = Jobs[v].Position;

            var y1 = Taskbars[v].getBoundingClientRect().top;
            var y2 = Taskbars[Jobs[v].Relation].getBoundingClientRect().top;

            el.style.height = y2 - y1
            Gamefield.insertBefore(el, Gamefield.firstChild);*/
        }
    }

    for (var c = 0; c < Taskbars.length; c++) {
        Taskbars[c].style.width = Jobs[c].Duration + 'px';
        Taskbars[c].style.marginLeft = Jobs[c].Position + 'px';
    }
}


//Функция входа
function Start()
{
    var evalstring = "";

    for (var j = 0; j < Selectors.length; j++) {
        if (j != Selectors.length - 1) {
            evalstring += Selectors[j].value + ", ";
        }
        else {
            evalstring += Selectors[j].value;
        }
    }

    evalstring = "Staff = [" + evalstring + "];";

    eval(evalstring);

    count = 0;
    idchance = getRandomInt(1, (Lead.Duration / Lead.Step) * 0.8);
    idchar = getRandomInt(0, Staff.length - 1);

    for (var i = 0; i < Jobs.length; i++) {
        Jobs[i].Step = Staff[i].Speed;
    }

    for (var s = 0; s < Staff.length - 1; s++) {
        for (var u = s + 1; u < Staff.length; u++) {
            if (Staff[s].Name == Staff[u].Name) {
                if (Jobs[s].Position <= Jobs[u].Position) {
                    Jobs[u].Relation = s;
                }
                else {
                    Jobs[s].Relation = u;
                }
            }
        }
    }

    proc = setInterval(Tick, 100);

    Gamestate.innerHTML = "Проект в разработке...";
}


//Функция действий по таймеру (непосредственно игровой процесс)
function Tick()
{
    var jobsdone = 0;

    if (Lead.Value < Lead.Duration) {
        Lead.Value += Lead.Step;
        Leadline.style.marginLeft = Lead.Value + 'px';
    }

    for (var i = 0; i < Jobs.length; i++) {
        if (Jobs[i].Relation != -1) {
            if (Jobs[Jobs[i].Relation].Value >= Jobs[Jobs[i].Relation].Duration) {
                Jobs[i].IsTriggered = true;
            }
        }
        else if (Lead.Value >= Jobs[i].Position) {
            Jobs[i].IsTriggered = true;
        }
    }

    for (var c = 0; c < Jobs.length; c++) {
        if (Jobs[c].IsTriggered) {
            if (Jobs[c].Value < Jobs[c].Duration) {
                Jobs[c].Value += Jobs[c].Step;

                Progress[c].style.width = Jobs[c].Value + 'px';

                cost += Staff[c].Cost;
                Label.innerHTML = "Расходы: " + cost + "$";
            }
        }
    }

    if (cost < budget) {
        Label.style.color = "Green";
    }
    else {
        Label.style.color = "Red";
    }

    count++;

    if (count == idchance) {
        var rand = getRandomInt(1, Staff[idchar].Luck);

        if (rand == 1) {
            //test.innerHTML = Staff[idchar].Name;
            Jobs[idchar].Step = Staff[idchar].Speed / 2;
            alert("Персонаж " + Staff[idchar].Name + " заболел. Теперь скорость одной из его работ снижена в 2 раза.");
        }
    }

    for (var a = 0; a < Jobs.length; a++) {
        if (Jobs[a].Value >= Jobs[a].Duration) {
            jobsdone++;
        }
    }

    if (jobsdone == Jobs.length) {
        if (cost <= budget) {
            IsDefeat = true;
            Gamestate.innerHTML = "Победа";
            Gamestate.style.color = "Green";
            isWon = '1';
            var data = isWon + ',' + login;
            //process(data);
            clearInterval(proc);
        }
        else {
            Gamestate.innerHTML = "Поражение";
            Gamestate.style.color = "Red";
            isWon = '0';
            var data = isWon + ',' + login;
            //process(data);
            clearInterval(proc);
        }
    }
    else if (Lead.Value >= Lead.Duration) {
        Gamestate.innerHTML = "Поражение";
        Gamestate.style.color = "Red";
        isWon = '0';
        var data = isWon + ',' + login;
        //process(data);
        clearInterval(proc);
    }
}


//Дополнительные функции

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function ToText() {
    //var str = Staff[0].Name + Staff[1].Name + Staff[2].Name + Staff[3].Name + Staff[4].Name;
    alert(FindEqual(Staff).toString());
}

function FindEqual(Mass) {
    var n = 0;

    for (var s = 0; s < Mass.length - 1; s++) {
        for (var u = s + 1; u < Mass.length; u++) {
            if (Mass[s].Name == Mass[u].Name) {
                if (Jobs[s].Position <= Jobs[u].Position) {
                    Jobs[u].Relation = s;
                }
                else {
                    Jobs[s].Relation = u;
                }
            }
        }
    }

    return n;
}


// AJAX
var xmlHttp = createXmlHttpRequestObject();

function createXmlHttpRequestObject(){
    var xmlHttp;

    if(window.ActiveXObject){
        try{
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch(e){
            xmlHttp = false;
        }
    }
    else{
        try{
            xmlHttp = new XMLHttpRequest();
        }
        catch(e){
            xmlHttp = false;
        }
    }

    if(!xmlHttp){
        alert("Ошибка создания объекта XMLHttpRequest.");
    }
    else{
        return xmlHttp;
    }
}

function process(variable){
    if(xmlHttp.readyState == 4 || xmlHttp.readyState == 0){
        xmlHttp.open("GET", "http://ghost.com/modules/ajax.php?get=" + variable, true);
        xmlHttp.send(null);
    }
    else{
        setTimeout("process(variable)", 1000);
    }
}