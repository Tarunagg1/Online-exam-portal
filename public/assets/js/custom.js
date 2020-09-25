$(document).on('submit', '#addcategoryform', function (e) {
    e.preventDefault();
    url = $(this).attr("action");
    data = $(this).serialize();
    $.post(url, data, function (fb) {
        resp = JSON.parse(fb);
        if (resp.status == 'true') {
            alert(resp.message);
            $("#addcategoryform").modal("hide")
        } else {
            alert(resp.message);
        }
    })
})

$(document).on("submit", '#exam_add', function (e) {
    e.preventDefault();
    url = $(this).attr('action');
    data = $(this).serialize();
    $.post(url, data, function (resp) {
        redata = JSON.parse(resp);
        if (redata.status == 'true') {
            swal({
                title: "Good job!",
                text: `${redata.message}`,
                icon: "success",
            });
            $("#addexam").modal('hide');
        } else {
            swal({
                title: "Good job!",
                text: `${redata.message}`,
                icon: "warning",
            });
        }
    })
})

$(".exmstatus").on('click', function () {
    id = $(this).attr("data-id");
    $.get('exmstatus/' + id, function (resp) {
        swal({
            title: "Good job!",
            text: `${resp}`,
            icon: "success",
        });
    })
})


$("#add_stu").on("submit",function(e){
    e.preventDefault();
    url = $(this).attr("action");
    data = $(this).serialize();
    $.post(url,data,function(resp){
        redata = JSON.parse(resp);
        if (redata.status == 'true') {
            console.log(redata)
            swal({
                title: "Good job!",
                text: `${redata.message}`,
                icon: "success",
            });
            $("#addexam").modal('hide');
        } else {
            swal({
                title: "Good job!",
                text: `${redata.message}`,
                icon: "warning",
            });
        }
    })
})

$(document).on('click','.studentstatus',function(){
    id = $(this).attr("data-id");
    $.get('studentstatus/' + id, function (resp) {
        swal({
            title: "Good job!",
            text: `${resp}`,
            icon: "success",
        });
    })
})


$("#add_portal").on("submit",function(e){
    e.preventDefault();
    url = $(this).attr("action");
    data = $(this).serialize();
    $.post(url,data,function(resp){
        redata = JSON.parse(resp);
        if (redata.status == 'true') {
            swal({
                title: "Good job!",
                text: `${redata.message}`,
                icon: "success",
            });
            $("#add_portal").modal('hide');
        } else {
            swal({
                title: "Good job!",
                text: `${redata.message}`,
                icon: "warning",
            });
        }
    })
})



$("#add_question").on("submit",function(e){
    e.preventDefault();
    url = $(this).attr("action");
    data = $(this).serialize();
    $.post(url,data,function(resp){
        console.log(resp);
        redata = JSON.parse(resp);
        if (redata.status == 'true') {
            swal({
                title: "Good job!",
                text: `${redata.message}`,
                icon: "success",
            });
            $("#addexam").modal('hide');
        } else {
            swal({
                title: "Good job!",
                text: `${redata.message}`,
                icon: "warning",
            });
        }
    })
})


$(document).on('click','.addquesstatus',function(){
    id = $(this).attr("data-id");
    $.get('/exam_system/admin/addquesstatus/'+id,function(fb){
        swal({
            title: "Good job!",
            text: `${fb}`,
            icon: "success",
        });
    })
})



