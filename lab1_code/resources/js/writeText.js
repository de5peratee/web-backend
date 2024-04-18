var text = "Биография Кирилла Станиславовича Шевелёва в программировании полна абсурдных фактов, " +
    "которые делают его крутым челиком даже в мире бинарных кодов. " +
    "Родился он с клавиатурой вместо пуповины и первые его слова были \"Hello, World\". " +
    "Его первый производственный проект был создан в возрасте 5 лет, и с тех пор он " +
    "неустанно работает над созданием инновационных программных решений. Он владеет " +
    "множеством языков программирования, включая Python, JavaScript, C++, и многие другие." +
    " Кирилл Станиславович является экспертом в области веб-разработки, и его работы получили " +
    "признание и похвалу от многих IT-экспертов. Он также является активным участником сообщества " +
    "разработчиков и регулярно выступает на конференциях и митапах, чтобы делиться своими знаниями и " +
    "опытом с другими программистами.Кирилл Станиславович Шевелёв - не просто программист, он маг-разработчик, " +
    "который способен создать волшебные программы, способные изменить мир. Он также увлечен музыкой и любит играть на " +
    "гитаре в свободное время. Его творческий подход к программированию и стремление к постоянному самосовершенствованию " +
    "делают Кирилла Станиславовича одним из ведущих разработчиков своего поколения. Если вы хотите связаться с " +
    "Кириллом Станиславовичем Шевелёвым, пожалуйста, заполните форму обратной связи на странице \"Контакт\".\n";
var randomChars = "!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
var result = "";
var cursor = 0;

function randomCharacter() {
    return randomChars[Math.floor(Math.random() * randomChars.length)];
}

for (var i = 0; i < text.length; i++) {
    result += randomCharacter();
}
document.querySelector(".info p").innerText = result;

function transformRandomCharacter() {
    var randomIndex = Math.floor(Math.random() * result.length);
    if (result[randomIndex] !== text[randomIndex]) {
        result = result.slice(0, randomIndex) + text[randomIndex] + result.slice(randomIndex + 1);
        document.querySelector(".info p").innerText = result;
    }
}

function transformSequentialCharacter() {
    if (result[cursor] !== text[cursor]) {
        result = result.slice(0, cursor) + text[cursor] + result.slice(cursor + 1);
        document.querySelector(".info p").innerText = result;
    }
    cursor++;
}

setTimeout(function() {
    setInterval(transformRandomCharacter, 1);
    setInterval(transformSequentialCharacter, 10);
}, 0);
