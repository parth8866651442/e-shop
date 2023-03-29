<!-- FOOTER-AREA START -->
<footer class="footer-area">
    <div class="footer-top"
        style="background: rgba(0, 0, 0, 0) url('{{asset('assets/img/bg/footer-bg.jpg')}}') no-repeat scroll center center;">
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-footer footer-logo">
                            <img src="{{asset('assets/img/logo.png')}}" alt="" />
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                                piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="single-footer footer-contact">
                            <h2>contact us</h2>
                            <ul>
                                <li>
                                    <i class="sp-phone"></i>
                                    <span>+91 {{Helper::settings('phone_1')}}</span>
                                </li>
                                <li>
                                    <i class="sp-email"></i>
                                    <span>{{Helper::settings('email_2')}}</span>
                                </li>
                                <!-- <li>
                                    <i class="sp-map-marker"></i>
                                    <span>{!! Helper::settings('address') !!}</span>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single-footer footer-menu">
                            <h2>consumer policy</h2>
                            <ul>
                                <li><a href="{{ route('returnsPolicy') }}">Return Policy</a></li>
                                <li><a href="{{ route('termsOfService') }}">Terms Of Use</a></li>
                                <li><a href="{{ route('support') }}">Security</a></li>
                                <li><a href="{{ route('privacyPolicy') }}">Privacy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="copyright-brief">
                        <p>Copyright &copy; <a href="https://themeforest.net/user/codecarnival/portfolio">Codecarnival</a> All right reserved</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="footer-social text-center text-md-end">
                        <a href="#"><i class="sp-facebook"></i></a>
                        <a href="#"><i class="sp-twitter"></i></a>
                        <a href="#"><i class="sp-linkedin"></i></a>
                        <a href="#"><i class="sp-google"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- FOOTER-AREA END -->

<!-- Modal -->
<div class="modal fade" id="cartItemRemoveModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Remove Item</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to remove this item?</p>
            </div><!-- .modal-body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="delete_sure">Remove</button>
            </div>
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div>


<!-- all js here -->
<!-- jquery latest version -->
<script src="{{asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
<!-- bootstrap js -->
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<!-- toastr notificaion -->
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('assets/plugins/toastr/toastr.js') }}"></script>
<!-- validate js -->
<script src="{{asset('assets/plugins/validate/jquery.validate.js'); }}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/validate/additional-methods.min.js'); }}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/validate/validation.js'); }}" type="text/javascript"></script>
<!-- jquery.nivo.slider js -->
<script src="{{asset('assets/lib/js/jquery.nivo.slider.js')}}"></script>
<script src="{{asset('assets/lib/home.js')}}"></script>
<!-- owl.carousel js -->
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<!-- meanmenu js -->
<script src="{{asset('assets/js/jquery.meanmenu.js')}}"></script>
<!-- jquery-ui js -->
<script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
<!-- lightbox.min js -->
<script src="{{asset('assets/js/lightbox.min.js')}}"></script>
<!-- countdon.min js -->
<script src="{{asset('assets/js/countdon.min.js')}}"></script>
<!-- wow js -->
<script src="{{asset('assets/js/wow.min.js')}}"></script>
<script type="text/javascript">
new WOW().init();
</script>
<!-- plugins js -->
<script src="{{asset('assets/js/plugins.js')}}"></script>
<!-- main js -->
<script src="{{asset('assets/js/main.js')}}"></script>


<script>
// delete mate confirmtion modal open 
function removeCartsItem(th) {
    $('#cartItemRemoveModal').modal('show');
    $("#delete_sure").val($(th).data('id'));
}

// one record delete function
$(document.body).on('click', '#delete_sure', function() {
    $('#cartItemRemoveModal').modal('hide');
    var id = $(this).val();
    $.ajax({
        url: "{{ route('deleteToCart','') }}/" + id,
        type: 'GET',
        dataType: 'Json',
        success: function(res) {
            if (res.status) {
                toastr.success(res.message);
            } else {
                toastr.error(res.message);
            }
            setTimeout(() => {
                window.location.replace(res.url);
            }, 1000);
        }
    });
});
</script>
@stack('scripts')

@if(Session::has('success'))
<script>
toastr.success("{{ Session::get('success') }}")
</script>
@elseif(Session::has('status'))
<script>
toastr.success("{{ Session::get('status') }}")
</script>
@elseif(Session::has('error'))
<script>
toastr.error("{{ Session::get('error') }}")
</script>
@endif
</body>

</html>