<?php
@include ("l0t/render.php");
?>

	<div class="bottom-menu bottom-menu-inverse bottom-menu-edit">
  		<div class="container">
    		<div class="row">
    			<div class="col-md-3">
                    <h5 class="footer-title">Informations</h5>
                    <ul class="footer-list">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Contact Us</a></li>                        
                    </ul>
                </div>
                <div class="col-md-3">
    				<h5 class="footer-title">Services</h5>
    				<ul class="footer-list">
    					<li><a href="#">Affiliates</a></li>
                        <li><a href="#">Payment Method</a></li>
                        <li><a href="/hitung-rate">Currency Converter</a></li>
    				</ul>
    			</div>
    			<div class="col-md-3">
    				<h5 class="footer-title">&nbsp;</h5>
    				<ul class="footer-list">
                        <li><a href="#/faq">Frequently Asked Questions</a></li>
                        <li><a href="/sla">Service Level Agreement (SLA)</a></li>
                        <li><a href="/tos">Term of Services (TOS)</a></li>
    				</ul>
    			</div>
    			<div class="col-md-3">
    				<h5 class="footer-title">Indonesia Exchanger</h5>
    				<p>
                        Menara BCA, Grand Indonesia Lt. 50<br />
						JL. MH Thamrin No. 1, Jakarta ID 10230<br />
						Phone: +6221-2358-4400<br />
						Email: info@exchanger.id
					</p>
    			</div>
    		</div>
 		 </div>
	</div>
    <div class="wrapper-payment">
        <div class="container">
            <div class="row row-payment">
                <div class="col-md-6">
                    <h5 style="margin-top:0; margin-bottom:20px">Metode Pembayaran</h5>
                    <img src="/asset/img/bank/bca.png" alt=""/>
                    <img src="/asset/img/bank/mandiri.png" alt=""/>
                    <img src="/asset/img/bank/bni.png" alt=""/>
                    <img src="/asset/img/bank/bri.png" alt=""/>
                </div>
                <div class="col-md-6">
                </div>
            </div>
            <div class="row row-social">
                <div class="col-md-8">
                    <img src="asset/img/logo-exchanger.png" alt="" width="60px" align="left">
                    <p>EX.ID adalah Premium Brand yang bergerak di bidang penyedia jasa transfer untuk kebutuhan para trader valuta asing di Indonesia.
Dengan teknologi premium kelas internasional, exchanger.id diciptakan untuk melayani customer-customer premium dan profesional yang menginginkan pelayanan maksimum.</p>
                </div>
                <div class="col-md-4">
                    <div class="social-icon">
                        <a href="#"><span class="fui-facebook"></span></a>
                        <a href="#"><span class="fui-skype"></span></a>
                        <a href="#"><span class="fui-twitter"></span></a>
                    </div>
                </div>
            </div>
            <div class="row row-copyright">
                <div class="col-md-6">
                   <div class="copyright">&copy;Copyright <?php echo date("Y");?> Foreign Currency Exchanger Indonesia.  All rights reserved.</div> 
                </div>
                <div class="col-md-6">
                    <ul class="menu-copyright">
                        <li><a href="/sla">Service Level Agreement</a></li>
                        <li><a href="/tos">Term of Services</a></li>
                        <li><a href="/landing">System Apps</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<script src="/asset/js/jquery-2.1.3.min.js"></script>
<script src="/asset/js/jquery.marquee.min.js"></script>
<script src="/asset/flatui/js/flat-ui-pro.min.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-62533362-4', 'auto'); ga('send', 'pageview');
</script>
<script>

    //select
	$("select").select2({dropdownCssClass: 'dropdown-inverse'});

    //running text
    $(function(){
        $('#marquee').marquee({
            duration: 20000,
            gap: 50,
            delayBeforeStart: 0,
            direction: 'left',
            duplicated: true,
            pauseOnHover: true
        });
    });

    //date picker
    var datepickerSelector = $('#datepicker-01');
    datepickerSelector.datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        dateFormat: 'd MM, yy',
     yearRange: '-1:+1'
    }).prev('.input-group-btn').on('click', function (e) {
        e && e.preventDefault();
        datepickerSelector.focus();
    });
    $.extend($.datepicker, { _checkOffset: function (inst,offset,isFixed) { return offset; } });

    // Now let's align datepicker with the prepend button
    datepickerSelector.datepicker('widget').css({ 'margin-left': -datepickerSelector.prev('.input-group-btn').find('.btn').outerWidth() + 3 });
</script>

</body>
</html>