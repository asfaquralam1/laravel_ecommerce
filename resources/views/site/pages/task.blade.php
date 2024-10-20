<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <button class="btn btn-primary mb-4" id="addForm">Add Content +</button>

    <div id="formContainer">

    </div>

    <button onclick="myFunction()">Remove</button>
    <!-- Optional JavaScript; choose one of the two! -->
    <script>
        document.getElementById('addForm').addEventListener('click', function() {
            // Create form element
            const form = document.createElement("form");
            form.setAttribute("action", "#");
            form.setAttribute("method", "POST");

            
            // Create a Title input element
            const header = document.createElement("h4");
            header.textContent = "Content";
            header.setAttribute("class", "p-2");
            header.setAttribute("style", "background-color: lightgrey;border-radius: 5px");
            // Create a Title input element
            const input = document.createElement("input");
            input.setAttribute("type", "text");
            input.setAttribute("placeholder", "Content Title");
            input.setAttribute("class", "form-control mb-4");

            const input1 = document.createElement("input");
            input1.setAttribute("type", "text");
            input1.setAttribute("placeholder", "Video Link");
            input1.setAttribute("class", "form-control mb-4");

            const input2 = document.createElement("input");
            input2.setAttribute("type", "text");
            input2.setAttribute("placeholder", "Content Length");
            input2.setAttribute("class", "form-control mb-4");

            // Create a saveBtn element
            const saveBtn = document.createElement("button");
            saveBtn.setAttribute("type", "submit");
            saveBtn.setAttribute("class", "btn btn-success mx-2");
            saveBtn.textContent = "Save";

            // Create a cancleBtn element
            const cancleBtn = document.createElement("button");
            cancleBtn.setAttribute("type", "submit");
            cancleBtn.setAttribute("class", "btn btn-danger");
            cancleBtn.textContent = "Cancle";

            // Append input to form
            form.appendChild(header)
            form.appendChild(input);
            form.appendChild(input1);
            form.appendChild(input2);
            form.appendChild(saveBtn);
            form.appendChild(cancleBtn);

            document.getElementById("formContainer").appendChild(form);
        })

        function myFunction() {
            const list = document.getElementById("formContainer");
            list.removeChild(list.lastElementChild);
        }
    </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>