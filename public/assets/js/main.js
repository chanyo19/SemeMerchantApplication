function opensectoreditapprovalmodal(id) {
    //console.log(id);

    $('#sec_edit_id').val(id);

    $.ajax({

        type:'get',
        dataType:'json',
        url:'/geteditsectorapprovaldata/'+id,

        success:function (res) {
           if(res){

               $('#sec_name').val(res.data[0].new_name);
               $('#old_name').val(res.data[0].old_name);
               $('#requestedby').val(res.data[0].requested_by);
               $('#requested_time').val(res.data[0].created_at);
               $('#sectorApprove').modal('show');
           }else{


           }
        }

    });



}

function open_doc_status(id){

    $.ajax({

         url:"/get_docs_status",
        data:{

             id:id,
        },
        method:'get',
        dataType:'json',
        success:function(res){


             $('#myModalLabel_doc').html(res["type"]);
             $('#body_model').html(res["res"]);
            $('#document_model').modal('show');
        }


    });



}
function opensectordeleteapprovalmodal(id){
    $('#sec_del_id').val(id);

    $.ajax({

        type:'get',
        dataType:'json',
        url:'/getdeletesectorapprovaldata/'+id,

        success:function (res) {
            if(res){
            console.log(res)
                 $('#sector_name').val(res.data[0].sec_name);
                $('#remark').val(res.data[0].remark);
                 $('#requested_by').val(res.data[0].requested_by);
                 $('#requestedtime').val(res.data[0].created_at);
                $('#sectordelApprove').modal('show');
            }else{


            }
        }

    });

}

$(document).ready(function () {


    $("#sendapproval").click(function () {
        var id=$('#sec_edit_id').val();
       var state=$('#state_approved').val();
        //console.log(id);

        $.ajax({
            type:'get',
            dataType:'json',
            data:{
                id:id,
                state:state

            },
            url:'/storeapprovalstatesectoredit',

            success:function (res) {
                if(res==1){
                    swal({
                        title: "Good job!",
                        text: "You Holed The Approval Request!!",
                        icon: "success",
                        button: "OK",
                    });

                }
                else if(res==2){
                    swal({
                        title: "Good job!",
                        text: "You Approved The Approval Request!!",
                        icon: "success",
                        button: "OK",
                    });

                }
                else if(res==3){
                    swal({
                        title: "Good job!",
                        text: "You Rejected The Approval Request!!",
                        icon: "success",
                        button: "OK",
                    });

                }

                window.location.reload();

            }
        });

    });
    $("#senddeleteapproval").click(function () {
        var id=$('#sec_del_id').val();
        var state=$('#state_approved_del').val();
        console.log(id);
        console.log(state);

        $.ajax({
            type:'get',
            dataType:'json',
            data:{
                id:id,
                state:state

            },
            url:'/storeapprovalstatesectordelete',

            success:function (res) {
                //console.log(res)
                if(res==1){
                    swal({
                        title: "Good job!",
                        text: "You Holed The Approval Request!!",
                        icon: "success",
                        button: "OK",
                    });

                }
                else if(res==2){
                    swal({
                        title: "Good job!",
                        text: "You Approved The Approval Request!!",
                        icon: "success",
                        button: "OK",
                    });

                }
                else if(res==3){
                    swal({
                        title: "Good job!",
                        text: "You Rejected The Approval Request!!",
                        icon: "success",
                        button: "OK",
                    });

                }

                window.location.reload();

            }
        });

    });
});


function opendocumentdeletemodal(id){
    $('#doc_del_id').val(id);
    $('#docDeleteapprovalModel').modal('show');

    // $.ajax({
    //
    //     type:'get',
    //     dataType:'json',
    //     url:'/getdeletesectorapprovaldata/'+id,
    //
    //     success:function (res) {
    //         if(res){
    //             console.log(res)
    //             $('#sector_name').val(res.data[0].sec_name);
    //             $('#remark').val(res.data[0].remark);
    //             $('#requested_by').val(res.data[0].requested_by);
    //             $('#requestedtime').val(res.data[0].created_at);
    //             $('#sectordelApprove').modal('show');
    //         }else{
    //
    //
    //         }
    //     }
    //
    // });



}
$(document).ready(function () {
    $("#senddeleteapprovaldoc").click(function () {


        //console.log('hi');
         var id=$('#doc_del_id').val();
         var state=$('#state_approved_del_doc').val();
        // console.log(id);
        // console.log(state);
        //
        $.ajax({
            type:'get',
            dataType:'json',
            data:{
                id:id,
                state:state

            },
            url:'/storeapprovalstatedocdelete',

            success:function (res) {
                console.log(res)
                //console.log(res);
                //console.log(res)
                if(res==1){
                    swal({
                        title: "Good job!",
                        text: "You Holed The Approval Request!!",
                        icon: "success",
                        button: "OK",
                    });

                }
                else if(res==2){
                    swal({
                        title: "Good job!",
                        text: "You Approved The Approval Request!!",
                        icon: "success",
                        button: "OK",
                    });

                }
                else if(res==3){
                    swal({
                        title: "Good job!",
                        text: "You Rejected The Approval Request!!",
                        icon: "success",
                        button: "OK",
                    });

                }else if(res==10){

                    swal({
                        title:"Error!!",
                        icon:"error",
                        text:'Document Not Deleted !!',
                        button:'OK'
                    })

                }

              window.location.reload();

            }
        });

    });



});

function sendForApproval(id){

    swal({
        title: 'Are you sure?',
        text: "This file will send for delete approvals",
        type: 'warning',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        confirmButtonText: 'Yes, delete it!',
        buttonsStyling: false
    }).then((val)=>{


        if (val["value"]) {


            $.ajax({

                method: "get",

                url: "/senddocdeleteapproval/"+id,
                dataType:"json",
                success: function (data) {


                    if(data["response"]=="success"){
                        location.reload();

                    }else{

                        swal({
                            type:'error',
                            title:'Something went wrong',
                            text: "Please try again",
                        });
                    }




                }
            });


        } else {
            swal("Delete action declined.");
        }



    });






}
function openprofilemodal(email){
    //$('#doc_del_id').val(id);
   // console.log(email)
   // $('#profilemodal').modal('show')
   // $('#profilemodal').modal('show');

    $.ajax({

        type:'get',
        dataType:'json',
        url:'/getuserinfo/'+email,

        success:function (res) {
            if(res){
                //console.log(res)
                var rolename=null;
                var userstate=null;

            if(res.data[0].user_type==1){
                rolename='User';
            }else if(res.data[0].user_type==2)

            {
                rolename='Secretary';
            }else if(res.data[0].user_type==3){
                rolename='Manager';
            }else if(res.data[0].user_type==4){
                rolename='Super Admin';
            }

            if(res.data[0].is_active==1){
                userstate="Active";
            }else{
                userstate="Inactive";
            }


                $('#user_name').val(res.data[0].name);
                $('#user_email').val(res.data[0].email);
                $('#user_company').val(res.data[0].department);
                $('#user_role').val(rolename);
                $('#api_key').val(res.data[0].api_key);
                $('#doc_count').val(res.data[0].doc_count);
                $('#user_state').val(userstate);
                $('#profilemodal').modal('show');
            }else{


            }
        }

    });



}

function openUserProfile(email) {
    //console.log(key)

    $.ajax({

        type:'get',
        dataType:'json',
        url:'/getuserinfo/'+email,

        success:function (res) {
            if(res){
              //  console.log(res)
                var rolename=null;
                var userstate=null;

                if(res.data[0].user_type==1){
                    rolename='User';
                }else if(res.data[0].user_type==2)

                {
                    rolename='Secretary';
                }else if(res.data[0].user_type==3){
                    rolename='Manager';
                }else if(res.data[0].user_type==4){
                    rolename='Super Admin';
                }

                if(res.data[0].is_active==1){
                    userstate="Active";
                }else{
                    userstate="Inactive";
                }


                $('#user_name').val(res.data[0].name);
                $('#user_email').val(res.data[0].email);
                $('#user_company').val(res.data[0].department);
                $('#user_role').val(rolename);
                $('#api_key').val(res.data[0].api_key);
                $('#doc_count').val(res.data[0].doc_count);
                $('#user_state').val(userstate);
                $('#profilemodal').modal('show');
            }else{


            }
        }

    });

}

function openUserEmailModel(email) {
    //console.log(key)


    $('#email').val(email);
    $('#emailModal').modal('show');

}

function openSectorViewModal(id){

    $.ajax({
       method:'get',
       dataType:'json',
        url:'/viewsectors/'+id,
        success:function (res) {
           //console.log(res.name)
            if(res){
                var name=res.name;

                $('#sec_name_by').val(name);
                $('#sec_created_by').val(res.created_by);
                $('#sec_status').val(res.is_active);
                $('#sec_created_at').val(res.created_at);
                $('#viewSectorModal').modal('show');
            }

        }

    });


}
function openCompanyViewModal(id) {

    $.ajax({
        method:'get',
        url:'/viewcompany/'+id,
        dataType:'json',
        success:function (res) {
           // console.log(res)
            $('#company_name').val(res.name);
            $('#company_sector_name').val(res.sector_id);
            $('#company_location_n').val(res.department_location);
            $('#company_hod').val(res.hod);
            $('#company_status').val(res.is_active);
            $('#company_created_by').val(res.created_by);
            $('#company_created_at').val(res.created_at);
            $('#viewCompanyModel').modal('show');

        }


    });
}
