@extends('layouts.layout')

@section('content')

    <style>
            
        html, body, div, span, applet, object, iframe,
        h1, h2, h3, h4, h5, h6, p, blockquote, pre,
        a, abbr, acronym, address, big, cite, code,
        del, dfn, em, img, ins, kbd, q, s, samp,
        small, strike, strong, sub, sup, tt, var,
        b, u, i, center,
        dl, dt, dd, ol, ul, li,
        fieldset, form, label, legend,
        table, caption, tbody, tfoot, thead, tr, th, td,
        article, aside, canvas, details, embed, 
        figure, figcaption, footer, header, hgroup, 
        menu, nav, output, ruby, section, summary,
        time, mark, audio, video {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
        }
        /* HTML5 display-role reset for older browsers */
        article, aside, details, figcaption, figure, 
        footer, header, hgroup, menu, nav, section {
            display: block;
        }
        body {
            line-height: 1;
        }
        ol, ul {
            list-style: none;
        }
        blockquote, q {
            quotes: none;
        }
        blockquote:before, blockquote:after,
        q:before, q:after {
            content: '';
            content: none;
        }
        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@400;700;900&display=swap');

        /* Переменные css, использование переменных - background-color: var(--bg-color);*/
        /* Теперь меняя значение акцентнового цвета в одном месте, мы изменим все значения, которые его использовали*/

        :root {
            --black: #171718;
            --bg-color: #fff;
            --green: #00D464;
            --blue: #1EA5FC;

            --accent: var(--blue);
        }

        body {
            background-color: var(--bg-color);
            margin: 0;
            padding: 0;
            font-family: 'Raleway', sans-serif;
            line-height: 1.5rem;
        }

        .container {
            max-width: 1160px;
            margin: 0 auto;
            border: 1px solid white;
            padding: 0 20px;
        }

        main {
            display: flex;
            justify-content: space-between;
            column-gap: 30px;
        }

        .ls {
            flex: 1;
            background-color: #580f0f;
        }

        .fixed {
            position: fixed;
        }

        .rs {
            flex: 1;
            background-color: #ffffff;
            padding: 20px;
        }

        .hidden {
            display: none;
        }



        /* TO DOs */

        .hideTheory {
            background-color: var(--blue);
            padding: 10px;
            color: #ffffff;
            margin-bottom: 10px;
            cursor: pointer;
        }

        h2 {
            color: cadetblue;
        }
        .todosContainer {
            padding: 20px;
            border: solid 1px #333;
        }
        .inputBlock {
            border: 1px solid #c5c5c5;
            border-radius: 3px;
            background-color: #f1f1f1;
            padding: 5px;
            margin-bottom: 10px;
        }

        .todoHeader {
            margin-bottom: 5px;
            font-weight: 700;
        }

        .todoBtn {
            background-color: var(--blue);
            color: #ffffff;
            border: none;
            border-radius: 6px;
            padding: 5px 10px;
            cursor: pointer;
        }

        .todosItem {
            margin-bottom: 10px;
        }

    </style>

    <div class="container">
        <header>        
            {{-- <h1>{{"Hello, $name! You are $age"}}</h1>     --}}
            <button class="switch">Одна колонка</button>
            <button class="modalActive">Модальное окно</button>
        </header>

        <nav>
                    
        </nav>

        <main>
            <div class="ls">
                <nav class="fixed">
                    <ul>
                        <li>
                            <a href="">Home</a>
                        </li>
                        <li>
                            <a href="">ToDoList</a>
                        </li>
                        <li>
                            <a href=""></a>
                        </li>
                        <li>
                            <a href=""></a>
                        </li>
                        <li>
                            <a href=""></a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="rs">
                <div class="hideTheory">Скрыть блок с теорией</div>

                <div class="theory">
                    <h1>Как писать приложение</h1>

                    <h2>1.Набросать прототип приложения</h2>

                    <h2>2.Определение пользовательских сценариев</h2>
                    <ul>
                        <li>Вывод списка дел</li>
                        <li>Добавление нового пункта</li>
                        <li>Удаление выполненной задачи</li>
                    </ul>

                    <h2>3.Выбор структуры данных и определение как они должны меняться, чтобы удовлетворить пользовательским сценариям</h2>

                    <p>В основе лежит todo(задача)</p>
                    <ul>
                        <li>У задачи есть название - text: string</li>
                        <li>Задача может быть выполнена или нет - done: bool</li>
                        <li>Каждая задача будет уникальна, поэтому присваиваем ей уникальный id: string</li>
                    </ul>

                    <p>Задачи объединяются в общую структуру - список дел - todos: Array</p>

                    <h2>4.Как должна меняться наша структура данных?</h2>

                    <li>Чтобы вывести список дел - вывести элементы массива</li>
                    <li>Чтобы добавить задачу - добавляем ее в массив</li>
                    <li>Чтобы удалить задачу - изменяем ее статус done на true</li>
                    
                    <h2>5.Описать структуру данных в коде</h2>

                <h2>6.Реализация UI, чтобы мы смогли визуально взаимодействовать с данными</h2>
                </div>

                <div class="todosContainer"> 
                    <div class="">
                        <label for="todoInput">Введите новую задачу:</label>
                        <input type="text" class="todoInput" id="todoInput">
                        <button class="todoBtn">Добавить</button>
                    </div>
                    <h3>Список дел</h3>
                    <div class="todosBox">
                    </div>
                </div>
            </div>
        </main>

        <footer>
        </footer>
    </div>

    <script>
        const switchBtn = document.querySelector('.switch');
        const ls = document.querySelector('.ls');

        switchBtn.addEventListener('click', ()=> {
            ls.classList.toggle('hidden')
            console.log(ls)
        })

    </script>

    <script>
    const todos = [];
    const todosNode = document.querySelector('.todosBox');
    const todoBtn = document.querySelector('.todoBtn')
    const todoInput = document.querySelector('.todoInput')
    const hideTheory = document.querySelector('.hideTheory')
    const theory = document.querySelector('.theory')

    //добавляем новую задачу в массив

    function addTodo(text) {
        const todo = {
            text,
            done: false,
            id: `${Math.random()}`
        }
        todos.push(todo);
    }

    //изменение статуса задачи на выполнен

    function deleteTodo(id) {
        todos.forEach((todo)=>{
            if(todo.id === id) {
                todo.done = true
            }
        });
    }

    addTodo('Читать каждый день по 20 страниц')
    addTodo('Делать зарядку')
    addTodo('Следить за осанкой')

    //вывод списка дел

    function render() {
        let html = ``;
        todos.forEach((todo) => {
            if(todo.done === false) {
                html += `
                    <div>
                        ${todo.text}
                        <button data-id='${todo.id}'>Сделано</button>
                    </div>
                `;
            }
        })
        todosNode.innerHTML = html; 
    }

    render()

    //добавляем интерактивный UI
    //добавление новой задачи по нажатию кнопки

    todoBtn.addEventListener('click', function() {
        const todoText = todoInput.value;
        if(todoText.length) {
            addTodo(todoText)
            render()
            todoInput.value = ''
        }
    });

    //помечаем задачу как сделанную и удаляем ее из списка задач
    //т.к. наши кнопки создаются динамически, то события мы будем обрабатывать на родительском контейнере
    todosNode.addEventListener('click', (event) => {
        if(event.target.tagName !== 'BUTTON') {
            return;
        }
        const id = event.target.dataset.id;
        deleteTodo(id)
        render()
    })


    //скрываем блок с теорией !!! переделать

    function hideTheoryBlock () {
        theory.style.display = 'none';
    }

    let flag = false;

    hideTheory.addEventListener('click', ()=> {


        if(!flag) {
            theory.style.display = 'none';
            hideTheory.innerHTML = 'Показать'
            flag = true;
        } 
        else if (flag) {
            theory.style.display = 'block'
            hideTheory.innerHTML = 'Скрыть блок с теорией'
            flag = false;
        }

        console.log(flag)
    })

    </script>

@endsection