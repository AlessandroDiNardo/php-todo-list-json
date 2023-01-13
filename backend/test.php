<?php

    $todoList = [
        [
            "text" => "CSS",
            "completed" => true
        ],
        [
            "text" => "HTML",
            "completed" => true
        ],
        [
            "text" => "PHP",
            "completed" => false
        ],
        [
            "text" => "JS",
            "completed" => false
        ]
    ];

    $jsonTodoList = json_encode($todoList);
    file_put_contents("todo.json", $jsonTodoList);

