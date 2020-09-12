"use strict";

$("#swal-1").click(function () {
    swal("Hello");
});

$("#swal-2").click(function () {
    swal("Good Job", "You clicked the button!", "success");
});

$("#swal-3").click(function () {
    swal("Good Job", "You clicked the button!", "warning");
});

$("#swal-4").click(function () {
    swal("Good Job", "You clicked the button!", "info");
});

$("#swal-5").click(function () {
    swal("Good Job", "You clicked the button!", "error");
});

function deleteData(id) {
    swal({
        title: "Are you sure?",
        text:
            "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: {
            cancel: {
                text: "Cancel",
                value: null,
                visible: true,
                closeModal: true,
            },
            confirm: {
                text: "OKAY",
                value: true,
                visible: true,
                closeModal: true,
            },
        },
        dangerMode: true,
    }).then((result) => {
        if (result === true) {
            document.getElementById("delete-form-" + id).submit();
        } else {
            swal("Your imaginary file is safe!");
        }
    });
}

$("#swal-7").click(function () {
    swal({
        title: "What is your name?",
        content: {
            element: "input",
            attributes: {
                placeholder: "Type your name",
                type: "text",
            },
        },
    }).then((data) => {
        swal("Hello, " + data + "!");
    });
});

$("#swal-8").click(function () {
    swal("This modal will disappear soon!", {
        buttons: false,
        timer: 3000,
    });
});
