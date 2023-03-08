<!-- Login Modal -->
<div class="modal fade" id="Login" style="text-align: center;" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="background-color: transparent;border: 0px solid rgba(0, 0, 0, 0.2);">
        <div class="modal-header">
         </div>
        <div class="modal-body">
          <div class="modal-login">
            <div class="sc-1706f29f-0 bkBHyq" style="
            bottom: 0px;
            left: 0px;
            z-index: 2;
            visibility: visible;
            transition: all 0.5s ease-in-out 0s;
            width: 100%;
            overflow: hidden;
            opacity: 1;
            height: 100%;">
              <div class="sc-58e23d11-0 jnLWQm">
                <div class="div_loginModal">
                  <div class="loginModal"><div class="sc-58e23d11-10 eAWxfI" data-bs-dismiss="modal" aria-label="Close" style="display: flex;padding: 20px;"></div>
                  <button class="sc-58e23d11-12 gptNSG" style="margin: 10px 10px 30px;display: flex;
                  -webkit-box-align: center;align-items: center;-webkit-box-pack: center;justify-content: center;background-color: transparent;cursor: pointer;">
                    <img src="https://z.nooncdn.com/s/app/com/common/icons/x.svg" style="height: 14px;
                    width: 14px;max-width: 100%;display: block;" alt="close-modal" data-bs-dismiss="modal" aria-label="Close" class="sc-b51db3f-1 iCVkuj"></button></div>
                    <div class="sc-58e23d11-2 jHquig" style="padding: 0px 40px;width: 100%;">
                    <h2 data-qa="lbl_modalGreeting_Welcome back!" class="lbl_modalGreeting_Welcome">Welcome back!</h2>
                      <h2 data-qa="lbl_modalTitle_Sign in to your account" class="Sign_in">Sign in to your account</h2>
                      <div class="div-sign-in"><h3 data-qa="lbl_modalSubTitle_Don't have an account?" class="lbl_modalSubTitle_Don">Don't have an account?</h3>
                        <h3 data-qa="btn_signUpButton" class="btn_signUpButton">Sign Up</h3></div>
                        <form class="theme-form" action="{{route('login_user')}}" method="POST" autocomplete="off">
                          @csrf
                        <div class="sc-d268662f-0 fALySb" style="position: relative;text-align: left;
                        width: 100%;">
                        <label class="lbl_Email">Email</label>
                          <input data-qa="lbl_value_" id="emailInput" class="emailInput" name="email" type="text" value="">
                          <span class="span_email"></span>
                          <div style="transition: opacity 250ms ease-in-out 0s, visibility 100ms ease-in-out 250ms; z-index: 1; opacity: 0; visibility: hidden;">
                         </div></div>

                            <div class="lbl_Password">
                              <label data-qa="lbl_Password" class="lbl_Password labelForInput">Password</label>
                              <div class="" style="display: flex;-webkit-box-align: center;align-items: center;border-bottom: 1px solid rgb(226, 229, 241);">
                                <input data-qa="lbl_Password" type="password" id="password" name="password" class="passwordInput" value="" required>
                                <button tabindex="-1" type="button" id="btnToggle" class="eye-button toggle-password">
                                  <img src="https://z.nooncdn.com/s/app/com/common/icons/eye.svg" id="eyeIcon" alt="Show/Hide Password" class="eye-image toggle-password">
                                </button>
                              </div>
                                <span class="span-password"></span>
                                <div data-qa="lbl_passwordError" class="lbl_passwordError">
                                  <div style="transition: opacity 250ms ease-in-out 0s, visibility 100ms ease-in-out 250ms; z-index: 1; opacity: 0; visibility: hidden;    flex: 1 1 0%;">
                                    <div class="error-message"></div></div></div></div></div>
                                    <a data-qa="btn_forgotPasswordButton" style="cursor:pointer" class="forgot-password" id="forgot-password">Forgot your password?</a>

                                    <div>
                                      <div class=" parent-btns" style="display:flex">
                                          <a href="{{ route('loginUsingFacebook') }}" class="facebook-circle" style="margin-right: 10px;">
                                              <div><img src="https://almotkamel.com/image/facebook_old.png" alt=""></div>
                                          </a>
                                          <a href="{{ route('redirectToGoogle') }}" class="google-circle">
                                              <div><img src="https://almotkamel.com/image/google_old.png" alt=""></div>
                                          </a>
                                      </div>
                                  </div>

                                    <div class="submit-div">
                                      <button id="login-submit" data-qa="btn_Sign In" type="submit" class="login-submit">Sign In</button>
                                    </div></div></div></div></div>
                                  </form>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                              </div>


  <!-- Register Modal -->
  <div class="modal fade" id="Register" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="background-color: transparent;">
        <div class="modal-body">
          <form class="theme-form" action="{{route('register_user')}}" method="post">
            @csrf
          <div class="sc-68fb2e3-0 hkofYU">
            <div class="sc-4ea766f3-0 iulrqW">
              <div class="sc-58e23d11-0 jnLWQm">
                <div data-qa="div_loginModal" class="sc-58e23d11-1 fIQGKa">
                  <div class="sc-58e23d11-14 igkYmr">
                    <div class="sc-58e23d11-10 eAWxfI"></div>
                    <button class="sc-58e23d11-12 gptNSG" data-bs-dismiss="modal" aria-label="Close">
                      <img src="https://z.nooncdn.com/s/app/com/common/icons/x.svg" alt="close-modal" class="sc-b51db3f-1 iCVkuj"></button></div>
                      <div class="sc-58e23d11-2 jHquig"><h2 data-qa="lbl_modalTitle_Create an account" class="sc-58e23d11-4 EgmaC">Create an account</h2>
                        <div class="sc-58e23d11-5 ezuSMO"><h3 data-qa="lbl_modalSubTitle_Already have an account?" class="sc-58e23d11-6 ecyTYS">Already have an account?</h3>
                          <h3 data-qa="btn_signUpButton" class="sc-58e23d11-7 flXQrt signUpButton">Sign In</h3></div>
                          <div class="sc-d268662f-0 fALySb"><label data-qa="lbl_Email" class="sc-d268662f-3 yEGev rtl-right labelForInput">Email</label>
                            <input data-qa="lbl_value_" id="emailInput" type="text" name="email" class="sc-d268662f-1 SvBgB" tabindex="0" value="" required>
                            <span class="sc-d268662f-2 ivOsjH"></span>
                            <div style="transition: opacity 250ms ease-in-out 0s, visibility 100ms ease-in-out 250ms; z-index: 1; opacity: 0; visibility: hidden;">
                              <p data-qa="lbl_emailError" class="sc-d268662f-4 iVwRAO"></p></div></div>
                              <div class="sc-9861f4d2-0 eZNVaV">
                                <label data-qa="lbl_Password" class="sc-9861f4d2-3 gUtHgd rtl-right labelForInput">Password</label>
                                <div class="sc-9861f4d2-6 NRjaQ">
                                  <input data-qa="lbl_value_" id="password" type="password" name="password"  class="passwordInput" value="" required>
                                  <button tabindex="-1" type="button" id="btnToggle" class="eye-button toggle-password">
                                    <img src="https://z.nooncdn.com/s/app/com/common/icons/eye.svg" id="eyeIcon" alt="Show/Hide Password" class="eye-image toggle-password">
                                  </button>
                                </div>
                                    <span class="sc-9861f4d2-2 JElhF"></span><div data-qa="lbl_passwordError" class="sc-9861f4d2-4 iziUgH">
                                      <div style="transition: opacity 250ms ease-in-out 0s, visibility 100ms ease-in-out 250ms; z-index: 1; opacity: 0; visibility: hidden;">
                                        <div class="error-message"></div></div>
                                        <div style="transition: opacity 250ms ease-in-out 0s, visibility 100ms ease-in-out 250ms; z-index: 1; opacity: 1; visibility: visible;">
                                          <div class="sc-8a2c22e1-0 jJbjoZ"><div class="password-strength-meter">
                                            <div class="password-strength-meter-wrapper" style="transition: opacity 250ms ease-in-out 0s, visibility 100ms ease-in-out 250ms; z-index: 1; opacity: 0; visibility: hidden;"><progress class="password-strength-meter-progress strength-weak" value="0" max="4"></progress>
                                              <div class="password-strength-meter-feedback">Weak</div></div></div></div></div></div></div><div class="sc-d268662f-0 fALySb">
                                                <label data-qa="lbl_First Name" class="sc-d268662f-3 yEGev rtl-right labelForInput">First Name</label>
                                                <input data-qa="lbl_value_" id="firstNameInput" type="text" class="sc-d268662f-1 SvBgB" tabindex="0" value="" name="fname" required>
                                                <span class="sc-d268662f-2 ivOsjH"></span>
                                                <div style="transition: opacity 250ms ease-in-out 0s, visibility 100ms ease-in-out 250ms; z-index: 1; opacity: 0; visibility: hidden;">
                                                  <p data-qa="lbl_first-nameError" class="sc-d268662f-4 iVwRAO"></p></div></div>
                                                  <div class="sc-d268662f-0 fALySb"><label data-qa="lbl_Last Name" class="sc-d268662f-3 yEGev rtl-right labelForInput">Last Name</label>
                                                    <input data-qa="lbl_value_" id="lastNameInput" type="text" class="sc-d268662f-1 SvBgB" tabindex="0" value="" name="lname" required>
                                                    <span class="sc-d268662f-2 ivOsjH"></span>
                                                    <div style="transition: opacity 250ms ease-in-out 0s, visibility 100ms ease-in-out 250ms; z-index: 1; opacity: 0; visibility: hidden;">
                                                      <p data-qa="lbl_last-nameError" class="sc-d268662f-4 iVwRAO"></p></div></div><br></div>

                                                    <div class="K-1uj Z7p_S">
                                                      <div class="s311c"></div>
                                                      <div class="_0tv-g"> OR </div>
                                                      <div class="s311c"></div>
                                                  </div>
                                                  <div>
                                                    <div class=" parent-btns" style="display:flex">
                                                        <a href="{{ route('loginUsingFacebook') }}" class="facebook-circle" style="margin-right: 10px;">
                                                            <div><img src="https://almotkamel.com/image/facebook_old.png" alt=""></div>
                                                        </a>
                                                        <a href="{{ route('redirectToGoogle') }}" class="google-circle">
                                                            <div><img src="https://almotkamel.com/image/google_old.png" alt=""></div>
                                                        </a>
                                                    </div>
                                                </div>
                                                      <div class="sc-58e23d11-8 lhHjiH">
                                                        <button id="login-submit" data-qa="btn_Create an account" style="background-color: transparent;" type="submit" class="sc-58e23d11-9 gKDJvb confirm">Create an account</button></div></div></div></div></div>
                                                          </form>
                                                          </div>
                                                          </div>

                                                        </div>
                                                      </div>
                                                    </div>


  <!-- Forget Password Modal -->
  <div class="modal fade" id="forget_password" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="background-color: transparent;border: 0px solid rgba(0, 0, 0, 0.2);">
        <div class="modal-body">
          <div class="sc-68fb2e3-0 hkofYU" style="position: fixed;
          bottom: 0px;
          left: 0px;
          z-index: 100000;
          transition: all 0.5s ease-in-out 0s;
          width: 100%;
          overflow: hidden;
          opacity: 1;
          height: 100%;
          visibility: visible;">
            <div class="sc-8797bb9b-0 gmuiIf" style="position: fixed;
            bottom: 0px;
            left: 0px;
            z-index: 2;
            transition: all 0.5s ease-in-out 0s;
            width: 100%;
            overflow: hidden;
            opacity: 1;
            height: 100%;
            visibility: visible;">
             <form class="theme-form" method="post" action="{{route('forget_pwd_user')}}">
              @csrf
              <div class="sc-58e23d11-0 jnLWQm">
                <div data-qa="div_loginModal" style="position: absolute;
                width: 90%;
                max-width: 400px;
                display: flex;
                flex-direction: column;
                -webkit-box-align: center;
                align-items: center;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                border-radius: 8px;
                background-color: rgb(255, 255, 255);
                background-image: url(https://z.nooncdn.com/s/app/com/noon/images/noon-logo-bg.svg);
                background-size: cover;
                background-repeat: no-repeat;
                height: auto;" class="sc-58e23d11-1 fIQGKa">
                  <div class="sc-58e23d11-14 kBPAuN" style="    display: flex;
                  -webkit-box-align: center;
                  align-items: center;
                  width: 100%;
                  -webkit-box-pack: justify;
                  justify-content: space-between;">
                    <div class="sc-58e23d11-13 jEnwRC" style="    display: flex;
                    color: rgb(64, 69, 83);
                    -webkit-box-align: center;
                    align-items: center;
                    padding: 20px;
                    cursor: pointer;">
                      <img src="https://z.nooncdn.com/s/app/com/common/icons/chevron-left.svg" style="display: inline-flex;" alt="Back" class="sc-b51db3f-1 iCVkuj back-button-image">
                      <p class="back-button-text" style="display: flex;
                      padding: 0px 10px;
                      font-weight: bold;">Back</p></div><div class="sc-58e23d11-10 eAWxfI" style="    display: flex;
      padding: 20px;"></div>
                      <button class="sc-58e23d11-12 gptNSG" data-bs-dismiss="modal" aria-label="Close" style="margin: 10px 10px 30px;
                      display: flex;
                      -webkit-box-align: center;
                      align-items: center;
                      -webkit-box-pack: center;
                      justify-content: center;"><img src="https://z.nooncdn.com/s/app/com/common/icons/x.svg" style="height: 14px;
      width: 14px;" alt="close-modal" class="sc-b51db3f-1 iCVkuj">
                      </button></div>
                      <div class="sc-58e23d11-2 jHquig" style="padding: 0px 40px;
                      width: 100%;">
                        <h2 data-qa="lbl_modalTitle_Forgot your password?" class="sc-58e23d11-4 EgmaC" style="font-size: 1.685rem;
                        text-align: center;
                        font-weight: 800;
                        color: rgb(64, 69, 83);cursor: pointer;">Forgot your password?</h2>
                        <div class="sc-58e23d11-5 ezuSMO" style="    display: flex;
                        margin-bottom: 25px;
                        -webkit-box-pack: center;
                        justify-content: center;">
                          <h3 data-qa="lbl_modalSubTitle_Enter your email address and we'll send you a link to reset your password"
                          style="margin: 12px 0px;
                          text-align: center;" class="sc-58e23d11-6 ecyTYS">Enter your email address and we'll send you a link to reset your password</h3>
                          <h3 data-qa="btn_signUpButton" style="margin: 12px 5px;
                          color: rgb(56, 102, 223);
                          cursor: pointer;" class="sc-58e23d11-7 flXQrt"></h3></div>
                          <div class="sc-d268662f-0 fALySb" style="    position: relative;

                          width: 100%;"><label data-qa="lbl_Email" style="    color: rgb(126, 133, 155);
                            font-size: 1rem;
                            max-width: 100%;
                            pointer-events: none;
                            white-space: nowrap;
                            text-overflow: ellipsis;
                            overflow: hidden;
                            transition: all 0.2s ease 0s;" class="sc-d268662f-3 yEGev rtl-right labelForInput">Email</label>
                            <input style="padding: 10px 0px 5px;background: transparent;
                            font-size: 16px;
                            color: rgb(64, 69, 83);
                            display: block;
                            width: 100%;
                            border-top: initial;
                            border-right: initial;
                            border-left: initial;
                            user-select: text;
                            transform: none;
                            cursor: auto;
                            border-image: initial;
                            border-bottom: 1px solid rgb(226, 229, 241);" id="emailInput" type="text" name="email" class="sc-d268662f-1 SvBgB" required>

                            <div style="transition: opacity 250ms ease-in-out 0s, visibility 100ms ease-in-out 250ms; z-index: 1; opacity: 0; visibility: hidden;">
                              <p data-qa="lbl_emailError" class="sc-d268662f-4 iVwRAO"></p></div></div><br><br></div>
                              <div class="sc-58e23d11-8 lhHjiH">
                                <button id="login-submit" data-qa="btn_Submit Email"
                                style="flex: 1 1 0%;
                                text-align: center;
                                font-size: 1.25rem;
                                color: rgb(56, 102, 223);
                                font-weight: 600;
                                padding: 18px 0px;
                                text-transform: uppercase;background-color: transparent;" type="submit" class="sc-58e23d11-9 gKDJvb confirm">Submit Email</button>
                              </div></div></div></div></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Password Reset Email Modal -->
  <div class="modal fade" id="Password_Reset" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="theme-card">
            <img src="https://z.nooncdn.com/s/app/com/noon/images/account/success-tick.svg" alt="forgot-password-success" width="30px" height="30px" class="sc-b51db3f-1 haBTOq">
            <h3>Password Reset Email Sent </h3>
            <p>We have sent you a reset password link to your email, please check your inbox.</p>
            <button id="login-submit" data-qa="btn_Back to Login" class="sc-58e23d11-9 gKDJvb confirm">Back to Login</button>
            </div>
        </div>

      </div>
    </div>
  </div>
