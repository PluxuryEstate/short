<html lang="en">
<head>
    <title>Сервис Сокращения ссылок</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>

<div class="container panel panel-default ">
    <h2 class="panel-heading">Сервис Сокращения ссылок</h2>
    <form id="contactForm" action="{{ route('links.send') }}">
        <div class="form-group">
            <input type="url" name="link" class="form-control" placeholder="Enter link" id="name">
        </div>


        <div class="form-group">
            <button class="btn btn-success" id="submit" type="submit" onClick="f1()">Submit</button>
        </div>
    </form>
    <p><strong>Короткая ссылка: <a href="{{ session()->get('success') }}">{{ session()->get('success') }}</a></strong></p>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script>
    // async function f1(e) { //вот тут начало async
    //     e.preventDefault()
    //     const get = document.getElementById('name').value
    //     let responce = await fetch("/link", { // вот тут сам асинхронный запрос
    //         method: 'POST',
    //         body: JSON.stringify(get)
    //     })
    //     let result = await responce.json()
    //     console.log(result)
    // }
    // const form = document.getElementById('contactForm')
    // console.log(form)

    $('#contactForm').on('submit',function(event){
        event.preventDefault();

        let name = $('#name').val();
        console.log(name)

        $.ajax({
            url: "/link",
            type:"POST",
            data:{
                "_token": "{{ csrf_token() }}",
                original_link:name,

            },
            success:function(response){
                // console.log(response);
            },
        });
    });
</script>
</body>
</html>
<meta name="csrf-token" content="{{ csrf_token() }}">
<html lang="en">
<head>
    <title>Сервис Сокращения ссылок</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>

<div class="container panel panel-default ">
    <h2 class="panel-heading">Сервис Сокращения ссылок</h2>
    <form id="contactForm" >
        <div class="form-group">
            <input type="url" name="link" class="form-control" placeholder="Enter link" id="name">
        </div>


        <div class="form-group">
            <button class="btn btn-success" id="submit" type="submit" onClick="f1()">Submit</button>
        </div>
    </form>
    <p><strong>Короткая ссылка: <a href="{{ session()->get('success') }}">{{ session()->get('success') }}</a></strong></p>

</div>

<script>
    let form = document.querySelector('form')
    console.log(form)
    form.addEventListener('submit', (event) => {
        console.log(form.elements.text.value);
        event.preventDefault()
        //fuck(form.elements.link.value)
    })

    async function fuck(data) {
        const responce = await fetch('/link', {
            method: 'POST',
            body: JSON.stringify(data)
        })
        console.log(responce);
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
