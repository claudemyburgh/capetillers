<template>
<div v-on:click="trigger" id="menu__trigger" class="menu__trigger"> 
    <div class="menu__trigger__loader">
        <i class="lunacon lunacon-settings-tool lunacon-spin-animation"></i>
    </div> 
</div>


</template>

<script>
    export default {
        props: [
            'url'
        ],
        methods: {

            trigger() {

                $('.menu__trigger__loader').show();
                axios.post(this.url).then(function() {      
                    var sidebar = $('.dashboard__sidebar'), body = $('body');
                    var $self = $(this);
                    if (body.hasClass('menu-small')){
                        body.removeClass('menu-small');
                    }else{
                        body.addClass('menu-small');
                    }
                    $('.menu__trigger__loader').fadeOut(300);
                });
            }

        },
        mounted() {
            
        }
    }
</script>
