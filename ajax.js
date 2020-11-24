var regex = /^(?=.*[a-zA-z])(?=.*[0-9])(?=.*[$`~!@$!%*#^?&\\(\\)\-_=+]).{8,16}$/;

focusout: function(e) {
            $(".nopw").hide();

            if(!regex.($(e.target).val())) {
                $(".nopw").show();
                return false;
            }
        }
    </script>

 