import AppForm from '../app-components/Form/AppForm';

Vue.component('user-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                first_name:  '' ,
                last_name:  '' ,
                email:  '' ,
                mobile_number:  '' ,
                email_verified_at:  '' ,
                password:  '' ,
                role_id:  '' ,
                status:  false ,
                
            }
        }
    }

});