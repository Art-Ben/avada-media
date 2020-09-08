<div class="kgdpr">
    <div class="kgdpr__wrapper">
        <div class="kgdpr__title">
            <?=get_field('kgdpr_title', 'options')?>
        </div>
        <div class="kgdpr__text">
            <?=get_field('kgdpr_text', 'options')?>
        </div>
        <div class="kgdpr__buttons">
            <a href="#" class="kgdpr__buttons__accept">
                <?=get_field('kgdpr_button_accept', 'options')?>
                <span class="decorUnderline"></span>
            </a>
            <!-- <a href="#" class="kgdpr__buttons__decline">
                <?=get_field('kgdpr_button_decline', 'options')?>
                <span class="decorUnderline"></span>
            </a> -->
        </div>
    </div>
</div>
<style>
	.kgdpr {
		background-color: rgba(0,0,0,0.8);
		position: fixed;
		width: 100%;
		bottom: 0;
		left: 0;
		z-index: 110;
		display: none !important;
	}
	.kgdpr__wrapper {
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-pack: justify;
        	-ms-flex-pack: justify;
        		justify-content: space-between;
		-webkit-box-align: center;
			-ms-flex-align: center;
		    	align-items: center;
    	max-width: 1200px;
    	padding: 5px 10px 4px;
    	margin: 0 auto;
	}
    .kgdpr__title {
        color: #fff;
        font-family: "Montserrat", sans-serif;
        font-size: 1rem;
        line-height: 1;
        font-weight: 700;
        text-transform: uppercase;
    }
    .kgdpr__text {
        color: #fff;
        font-size: 1.2rem;
        line-height: 1.6rem;
        font-weight: 300;
        text-align: center;
        margin: 0 10px;
    }
    .kgdpr__buttons {
    	font-size: 0;
    	line-height: 0;
    }
	.kgdpr__buttons a {
		color: #fff;
        font-family: "Montserrat", sans-serif;
    	font-size: 1rem;
    	line-height: 1;
        font-weight: 700;
        text-transform: uppercase;
	}
    @media screen and (max-width: 767px) {
        .kgdpr__title {
            display: none;
        }
        .kgdpr__text {
            text-align: left;
            margin: 0 10px 0 0;
        }
    }
    @media screen and (max-width: 575px) {
		.kgdpr__wrapper {
			flex-wrap: wrap;
		}
		.kgdpr__text {
            margin: 0;
        }
        .kgdpr__buttons {
        	margin-left: auto;
        }
    }
</style>
<script>
    class KGDPR{
        constructor(){
            this.accept = localStorage.getItem('kgdpr');
            this.dom = document.querySelector('.kgdpr');
            this.acceptBtn = this.dom.querySelector('.kgdpr__buttons__accept');
            // this.declineBtn = this.dom.querySelector('.kgdpr__buttons__decline');
            let o = this;
            this.acceptBtn.addEventListener('click', function(e){
                e.preventDefault();
                o.a();
                return false;
            });
            // this.declineBtn.addEventListener('click', function (e) {
            //     e.preventDefault();
            //     o.d();
            //     return false;
            // });
            this.init();
        }
        init(){
            if(this.accept != '1'){
                this.dom.style.display = 'block';
            }
        }
        a(e){
            localStorage.setItem('kgdpr', '1');
            this.dom.remove();
        }
        d(e){
            window.history.back();
        }
    }
    new KGDPR();
</script>