$( document ).ready(function() {

    $('#activate-form').isHappy({
      fields: {
        // reference the field you're talking about, probably by `id`
        // but you could certainly do $('[name=name]') as well.
        '#first_name': {
          required: true,
          when: 'blur',
          message: 'Might we inquire your name'
        }

      }
    });
    

        $('.smart-selection').on('change', function(){
            var $selection = $('input[name="carRadio"]:checked', '.smart-selection').val()
            if ($selection == 'Yes') {
                $('.car-information').addClass('is-visible');
            } else {
                $('.car-information').removeClass('is-visible');
            }
        });


        $('.allergy-selection').on('change', function(){
            var $selection = $('input[name="allergyRadio"]:checked', '.allergy-selection').val()
            if ($selection == 'Yes') {
                $('.allergy-information').addClass('is-visible');
            } else {
                $('.allergy-information').removeClass('is-visible');
            }
        });
         
        $('.form-item').on('click', function () {
            var $this = $(this).data('target');
            var $url = $(this).data('url');
            console.log($url);
            $('#results-modals').load('templates/member/' + $url + '.php' + $this, function (response, status, xhr) {
                if (status == "success") {
                    $($this).modal('show');
                }
            });
        });
      

        $('.admin-form-item').on('click', function () {
            var $this = $(this).data('target');
            var $url = $(this).data('url');
            console.log($url);
            $('#results-modals').load('templates/admin/' + $url + '.php' + $this, function (response, status, xhr) {
                if (status == "success") {
                    $($this).modal('show');
                }
            });
        });



        $('#editAccountInformation .close').on('click', function(){
            $("#editAccountInformation").modal('hide');
            $('#editAccountInformation').remove();
        });
        $('.modal-body input[type=submit]').on('click', function(){
            $(this).submit();
        });
     





    $('#account-edit').click(function(){
    	document.getElementById('account-info').style.display = "block";
    	document.getElementById('cancel-account-edit').style.display = "block";
    })
    
    $('#cancel-account-edit').click(function(){
    	document.getElementById('account-info').style.display = "none";
    	document.getElementById('cancel-account-edit').style.display = "none";
    })
    
    $('#account-general-edit').click(function(){
    	document.getElementById('general-info').style.display = "block";
    	document.getElementById('cancel-general-edit').style.display = "block";
    })
    
    $('#cancel-general-edit').click(function(){
    	document.getElementById('general-info').style.display = "none";
    	document.getElementById('cancel-general-edit').style.display = "none";
    })
    
    $('#account-parent-edit').click(function(){
    	document.getElementById('parent-info').style.display = "block";
    	document.getElementById('cancel-parent-edit').style.display = "block";
    })
    
    $('#cancel-parent-edit').click(function(){
    	document.getElementById('parent-info').style.display = "none";
    	document.getElementById('cancel-parent-edit').style.display = "none";
    })
    
    $('#account-other-edit').click(function(){
    	document.getElementById('other-info').style.display = "block";
    	document.getElementById('cancel-other-edit').style.display = "block";
    })
    
    $('#cancel-other-edit').click(function(){
    	document.getElementById('other-info').style.display = "none";
    	document.getElementById('cancel-other-edit').style.display = "none";
    })
    
    $('#account-car-edit').click(function(){
    	document.getElementById('car-info').style.display = "block";
    	document.getElementById('cancel-car-edit').style.display = "block";
    })
    
    $('#cancel-car-edit').click(function(){
    	document.getElementById('car-info').style.display = "none";
    	document.getElementById('cancel-car-edit').style.display = "none";
    })
    
    $('#account-allergy-edit').click(function(){
    	document.getElementById('allergy-info').style.display = "block";
    	document.getElementById('cancel-allergy-edit').style.display = "block";
    })
    
    $('#cancel-allergy-edit').click(function(){
    	document.getElementById('allergy-info').style.display = "none";
    	document.getElementById('cancel-allergy-edit').style.display = "none";
    })
    
    $('#account-health-edit').click(function(){
    	document.getElementById('health-info').style.display = "block";
    	document.getElementById('cancel-health-edit').style.display = "block";
    })
    
    $('#cancel-health-edit').click(function(){
    	document.getElementById('health-info').style.display = "none";
    	document.getElementById('cancel-health-edit').style.display = "none";
    })
    
     $('#account-auto-edit').click(function(){
    	document.getElementById('auto-info').style.display = "block";
    	document.getElementById('cancel-auto-edit').style.display = "block";
    })
    
    $('#cancel-auto-edit').click(function(){
    	document.getElementById('auto-info').style.display = "none";
    	document.getElementById('cancel-auto-edit').style.display = "none";
    })
});
