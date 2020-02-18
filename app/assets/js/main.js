$(document).ready(function () {
    console.log("JS works!")
    populateCarModels()

    loadCars()

    $("#tbName").blur(checkName)
    $("#tbName").addClass("cssBorder")
    $("#tbEmail").blur(checkEmail)
    $("#tbEmail").addClass("cssBorder")
    $("#content").blur(checkMessage)
    $("#content").addClass("cssBorder")
    $("#ddlCar").blur(checkCarSelect)
    $("#ddlCar").addClass("cssBorder")

    $("#btnSchedule").click(checkForm)
})

const baseURL = "http://localhost/Skoda/index.php";


let reName = /^[A-Z][a-z]{2,15}(\s[A-Z][a-z]{2,15})*$/
let reEmail = /^[\w]+[\.\w\d]*\@[\w]+([\.][\w]+)+$/
let reMessage = /^[\w\W\d\D\s\S\b\B\n\r\t]{15,}$/

function checkCarSelect() {
    let ddlCar = $("#ddlCar").val()
    if (ddlCar == '0') {
        $("#ddlCar").addClass("notCorrect")
    } else {
        $("#ddlCar").removeClass("notCorrect")
    }
}

function checkName() {
    let name = $("#tbName").val()
    if (!reName.test(name)) {
        $("#tbName").addClass("notCorrect")
    } else {
        $("#tbName").removeClass("notCorrect")
    }
}

function checkEmail() {
    let email = $("#tbEmail").val()
    if (!reEmail.test(email)) {
        $("#tbEmail").addClass("notCorrect")
    } else {
        $("#tbEmail").removeClass("notCorrect")
    }
}

function checkMessage() {
    let message = $("#content").val()
    if (!reMessage.test(message)) {
        $("#content").addClass("notCorrect")
    } else {
        $("#content").removeClass("notCorrect")
    }
}

function checkForm() {
    let name = $("#tbName").val()
    let email = $("#tbEmail").val()
    let message = $("#content").val()
    let carSelect = $("#ddlCar").val()

    let arrayMistakes = []

    if ($('.notCorrect').length || (name == "") || (email == "") || (message == "") || (carSelect == '0')) {

        if (carSelect == '0') {
            arrayMistakes.push("You must choose a car!")
        }
        if (!reName.test(name))
            arrayMistakes.push("Name is not in good format!")
        if (!reEmail.test(email))
            arrayMistakes.push("Email is not in good format!")
        if (!reMessage.test(message))
            arrayMistakes.push("Message must contain at least 15 characters!")

        checkEmpty(name, email, message, carSelect)
        writeMistakes(arrayMistakes)

    } else {
        alert("Message sent successfuly!")
        $("#notification").html("")
    }
}

function checkEmpty(name, email, message, carSelect) {
    if (name == "")
        $("#tbName").addClass("notCorrect")
    if (email == "")
        $("#tbEmail").addClass("notCorrect")
    if (message == "")
        $("#content").addClass("notCorrect")
    if (carSelect == "0")
        $("#ddlCar").addClass("notCorrect")
}

function writeMistakes(arrayMistakes) {
    let print = "<ul>"
    for (let i = 0; i < arrayMistakes.length; i++) {
        print += "<li>" + arrayMistakes[i] + "</li>"
    }
    print += "</ul>"
    $('#notification').html(print)
}

function populateCarModels() {
    $.ajax({
        url: "index.php?ajax=ajaxCarModels",
        method: "GET",
        dataType: "json",
        success: function (data) {
            printCarModels(data)
        },
        error: function (xhr, status, error) {
            console.log(status)
            console.log(xhr.status)
            console.log(error)
            console.log(xhr.responseText)
        }
    })
}

function printCarModels(cars) {
    let print = ""
    for (let car of cars) {
        print += printCarModel(car);
    }
    $(".flex-grid").html(print)
}

function printCarModel(car) {
    return `
    <div class="col">
        <a href="index.php?page=carModel&idModel=${car.idModel}">
            <img src="${car.path}" class="scaling-img" alt="${car.alt}" />
            <h3 class="text-center font-weight-bold">${car.name}</h3>
        </a>
    </div>`
}

$("#btnRegister").click(function () {
    let first_name = $("#tbFirstName").val()
    let last_name = $("#tbLastName").val()
    let email = $("#tbEmail").val()
    let password = $("#tbPassword").val()

    let reFirstName = /^[A-ZČĆĐŠŽa-zčćđšž]{2,20}$/
    let reLastName = /^[A-ZČĆĐŠŽa-zčćđšž]{2,20}$/
    let reEmail = /^[\w]+[\.\w\d]*\@[\w]+([\.][\w]+)+$/
    let rePassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$^!+=*-_.@]).{8,32}$/

    let errors = []

    if (!reFirstName.test(first_name)) {
        errors.push("First name is not in good format!")
    }
    if (!reLastName.test(last_name)) {
        errors.push("Last name is not in good format!")
    }
    if (!reEmail.test(email)) {
        errors.push("Email is not in good format!")
    }
    if (!rePassword.test(password)) {
        errors.push("Password is not in good format")
    }

    if (errors.length > 0) {
        let print = "<ul>"
        for (let error of errors) {
            print += "<li>" + error + "</li>"
        }
        print += "</ul>"
        $("#feedback").html(print)
    }
    else {
        $.ajax({
            url: "index.php?ajax=ajaxRegister",
            method: "POST",
            data: {
                first_name: $("#tbFirstName").val(),
                last_name: $("#tbLastName").val(),
                email: $("#tbEmail").val(),
                password: $("#tbPassword").val(),
                send: true
            },
            success: function () {
                $("#feedback").html("Successfuly registered!")
            },
            error: function (xhr, status, error) {
                console.log(status)
                console.log(xhr.status)
                console.log(error)
                console.log(xhr.responseText)
            }
        })
    }
})

function loadCars() {
    $.ajax({
        url: "index.php?ajax=ajaxLoadCars",
        method: "GET",
        dataType: "json",
        success: function (data) {
            printCars(data)
        },
        error: function (xhr, status, error) {
            console.log(status)
            console.log(xhr.status)
            console.log(error)
            console.log(xhr.responseText)
        }
    })
}

function printCars(cars) {
    let html = ""
    for (let car of cars) {
        html += printCar(car)
    }
    $("#tableCars").html(html)
}

function printCar(car) {
    return `
    <tr>
      <td>${car.idCar}</td>
      <td>${car.carName}</td>
      <td>
        <img src="${car.miniImage}" alt="${car.alt}" />
      </td>
      <td>${car.price} &euro;</td>
      <td>
        <a href="#" data-id="${car.idCar}" data-image="${car.miniImage}" class="deleteCar btn btn-danger">Delete</a>
        <a href="" data-id="${car.idCar}" class="updateCar btn btn-primary">Update</a>
      </td>
    </tr>
    `
}

$(document).on('click', '.updateCar', function (e) {
    e.preventDefault()
    $("#updateInfo").slideDown("slow")

    let id = $(this).data('id')

    $.ajax({
        url: "index.php?ajax=ajaxUpdateCars",
        method: "POST",
        dataType: "json",
        data: {
            id: id
        },
        success: function (data) {
            console.log(data)
            $("#tbCarName").val(data.carName)
            $("#carPrice").val(data.price)

            $("#srcImage").val(data.idCar)
            //$("#srcImage").val(data.miniImage)
            

            $("#emptyImage").attr("src", data.miniImage)
            $("#emptyImage").attr("alt", data.alt)
        },
        error: function (xhr, status, error) {
            console.log(status)
            console.log(xhr.status)
            console.log(error)
            console.log(xhr.responseText)
        }
    })
})

$(document).on('click', '.deleteCar', function (e) {
    e.preventDefault()

    let id = $(this).data('id')
    let warn = confirm("Do you want to delete this car?")

    if (warn) {
        $.ajax({
            url: "index.php?ajax=ajaxDeleteCars",
            method: "POST",
            dataType: "json",
            data: {
                id: id,
                send: true
            },
            success: function () {
                alert("Successfully deleted car!")
                loadCars()
            },
            error: function (xhr, status, error) {
                console.log(status)
                console.log(xhr.status)
                console.log(error)
                console.log(xhr.responseText)
            }
        })
    }
})

$("#ddlSort").change(function () {
    let idSort = $(this).val()
    let idBodywork = $("#ddlBodywork").val()

    $.ajax({
        url: "index.php?ajax=ajaxSortFilter",
        method: "POST",
        dataType: "json",
        data: {
            idBodywork: idBodywork,
            idSort: idSort,
            send: true
        },
        success: function (data) {
            printCarModels(data)
        },
        error: function (xhr, status, error) {
            console.log(status)
            console.log(xhr.status)
            console.log(error)
            console.log(xhr.responseText)
        }
    })
})

$("#ddlBodywork").change(function () {
    let idBodywork = $(this).val()
    $('#ddlSort').val(0)

    $.ajax({
        url: "index.php?ajax=ajaxSortFilter",
        dataType: "json",
        method: "POST",
        data: {
            idBodywork: idBodywork,
            idSort: 0,
            send: true
        },
        success: function (data) {
            printCarModels(data)
        },
        error: function (xhr, status, error) {
            console.log(status)
            console.log(xhr.status)
            console.log(error)
            console.log(xhr.responseText)
        }
    })
})

if ((window.location.href == baseURL + "?page=adminHome") || (window.location.href == baseURL + "?page=adminHome#")) {
    $.ajax({
        url: "index.php?ajax=ajaxLoadStatistics",
        dataType: "json",
        method: "GET",
        success: function (data) {
            console.log(data)
            let chart = new
                CanvasJS.Chart("chartContainer", {
                    title: {
                        text: "Page Visits"
                    },
                    data: [{
                        type: "pie",
                        legendText: "{label}",
                        indexLabelFontSize: 20,
                        indexLabel: "{label} = #percent % ",
                        yValueFormatString: "฿#,##0",
                        dataPoints: data
                    }]
                });
            chart.render();
        },

        error: function (xhr, status, error) {
            console.log(status)
            console.log(xhr.status)
            console.log(error)
            console.log(xhr.responseText)
        }
    })
}