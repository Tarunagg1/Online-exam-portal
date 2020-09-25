$("#portalsignup").on("submit", function (e) {
    e.preventDefault();
    url = $(this).attr("action");
    data = $(this).serialize();
    $.post(url, data, function (resp) {
        redata = JSON.parse(resp);
        if (redata.status == 'true') {
            swal({
                title: "Good job!",
                text: `${redata.message}`,
                icon: "success",
            });
        } else {
            swal({
                title: "Ohh snap!",
                text: `${redata.message}`,
                icon: "warning",
            });
        }
    })
})

$("#login").on("submit",function(e){
    e.preventDefault();
    url = $(this).attr("action");
    data = $(this).serialize();
    $.post(url,data,function(resp){
        redata = JSON.parse(resp);
        if (redata.status == 'true') {
            window.location.href = redata.load;
        } else {
            swal({
                title: "Ohh snap!",
                text: `${redata.message}`,
                icon: "warning",
            });
        }
   })
})

$("#exm-form").on("submit", function (e) {
    e.preventDefault();
    url = $(this).attr("action");
    data = $(this).serialize();
    $.post(url, data, function (resp) {
        console.log(resp);
        redata = JSON.parse(resp);
        if (redata.status == 'true') {
            swal({
                title: "Good job!",
                text: `${redata.message}`,
                icon: "success",
            });
            window.location.href = `/exam_system/portal/printr/${redata.tsid}`
        } else {
            swal({
                title: "Ohh snap!",
                text: `${redata.message}`,
                icon: "warning",
            });
        }
    })
})

$("#userformupdate").on("submit", function (e) {
    e.preventDefault();
    url = $(this).attr("action");
    data = $(this).serialize();
    $.post(url, data, function (resp) {
        console.log(resp);
        redata = JSON.parse(resp);
        if (redata.status == 'true') {
            swal({
                title: "Good job!",
                text: `${redata.message}`,
                icon: "success",
            });
            window.location.href = `/exam_system/portal/update-form`;
        } else {
            swal({
                title: "Ohh snap!",
                text: `${redata.message}`,
                icon: "warning",
            });
        }
    })
})