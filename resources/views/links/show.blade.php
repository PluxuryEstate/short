@extends('layouts.main')
@section('content')

s<meta name="csrf-token" content="{{ csrf_token() }}">
<html lang="en">
<head>
    <title>Сервис Сокращения ссылок</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>





<form >

    <input type="url" name="original_link">

    <button type="submit" >click</button>
</form>

    <p><strong>Короткая ссылка: <a href="{{ session()->get('success') }}">{{ session()->get('success') }}</a></strong></p>



<script>
    let form = document.querySelector('form')
    form.addEventListener('submit', (event) => {
        console.log(form.elements.original_link.value);
        event.preventDefault()
        send(form.elements.original_link.value)

    })

    async function send(data) {
        const responce = await fetch('/link', {
            method: 'POST',

            body: new FormData(form),

        })
        let result = await responce

        console.log(result);
    }

   /* let submit =  document.getElementById('submit');
    submit.addEventListener('click', (e)=>f1(e))
    async function f1(e) { //вот тут начало async
        e.preventDefault()
        const get = document.getElementById('name').value
        let responce = await fetch("/link", { // вот тут сам асинхронный запрос
            method: 'POST',
            body: JSON.stringify(get)
        })
        let result = await responce.json()
        console.log(result)
    }
    const form = document.getElementById('contactForm')
    console.log(form)*/
</script>
