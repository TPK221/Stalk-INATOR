@extends('layouts.HeaderFooter')

@section('content')
<div class="mdk-header-layout__content page-content ">
    <div class="mdk-box mdk-box--bg-gradient-primary overlay-div js-mdk-box position-relative overflow-hidden mb-0" data-effects="parallax-background blend-background">
        <div class="mdk-box__bg">
            <div class="mdk-box__bg-front" style="background-image: url(assets/images/SE3.png);"></div>
        </div>
        <div class="mdk-box__content">
            <div class="container page__container py-64pt py-md-120pt">
                <div class="row align-items-center text-center text-md-left">
                    <div class="col-md-6 col-lg-6 order-1 order-md-0">
                        <h1 class="text-white">Welcome to Stalk-INATOR! Learn how to Social Engineer</span></h1>
                        <!--<p class="lead mb-42pt mb-lg-58pt text-black font-weight-bold strong">What is Social Engineering?<br>It is a manipulation technique that exploits human error to gain private information, access, or valuables. </p>-->
                        <p class="lead mb-32pt mb-lg-58pt text-white">This is a mission-based platform to promote social engineering knowledge and awareness in the education levels.</p>
                        @if (Route::has('login'))
                        @auth
                        @if (Auth:: user()->hasRole('student'))
                        <a href="{{ route('missions') }}" class="btn btn-lg btn-success btn--raised mb-16pt">Start Playing</a>
                        @elseif(Auth::user()->hasRole('lecturer'))
                        <a href="{{ route('missions.addmissions') }}" class="btn btn-lg  btn--raised  mb-16pt bg-success text-light">Add Missions</a>
                        @endif
                        @else
                        <a href="{{ route('register') }}" class="btn btn-lg btn-success btn--raised mb-17pt text-black">Start Playing</a>
                        @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white border-bottom-2 py-16pt py-sm-24pt py-md-32pt ">
        <div class="container page__container">
            <div class="row align-items-center">
                <div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt mb-md-0 pb-16pt pb-md-0">
                    <div class="rounded-circle bg-warning w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                        <i class="material-icons text-white">subscriptions</i>
                    </div>
                    <div class="flex">
                        <p class="mb-0 ml-10"><strong>A wide number of missions to choose from!</strong></p>
                        <p class="text-black-70 mb-0">Test your skills to successfully social engineer someone.</p>
                    </div>
                </div>
                <div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt mb-md-0 pb-16pt pb-md-0">
                    <div class="rounded-circle bg-warning w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                        <i class="material-icons text-white">verified_user</i>
                    </div>
                    <div class="flex">
                        <p class="mb-0"><strong>Missions added by lecturers!</strong></p>
                        <p class="text-black-70 mb-0">Mission situations are curated by lecturers which gives a much more challenging feel.</p>
                    </div>
                </div>
                <div class="d-flex col-md align-items-center">
                    <div class="rounded-circle bg-warning w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                        <i class="material-icons text-white">update</i>
                    </div>
                    <div class="flex">
                        <p class="mb-0"><strong>A leaderboard for bragging rights!</strong></p>
                        <p class="text-black-70 mb-0">Every mission submitted will be awarded points and the individual with the most points will win a prize.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section">
        <div class="container page__container">
            <div class="page-headline text-center">
                <h2>What is Social Engineering?</h2>
                <br><br>
                <div style="text-align: center;">
                    <img class="img-social-engineering " src="assets/images/SEE.webp">
                    <br><br><br>
                    <blockquote class="blockquote">
                        <p class="mb-0 text-align-SE ">Social engineering is a manipulation technique that exploits human error to gain private information, access, or valuables. 
                            In cybercrime, these “human hacking” scams tend to lure unsuspecting users into exposing data, spreading malware infections, or giving access to 
                            restricted systems. Attacks can happen online, in-person, and via other interactions.
                            Scams based on social engineering are built around how people think and act. As such, social engineering attacks are especially useful for manipulating 
                            a user’s behavior. Once an attacker understands what motivates a user’s actions, they can deceive and manipulate the user effectively.

                            In addition, hackers try to exploit a user's lack of knowledge. Thanks to the speed of technology, many consumers and employees aren’t aware of certain 
                            threats like drive-by downloads. Users also may not realize the full value of personal data, like their phone number. As a result, many users are unsure 
                            how to best protect themselves and their information.

                            Generally, social engineering attackers have one of two goals:

                            Sabotage: Disrupting or corrupting data to cause harm or inconvenience.
                            Theft: Obtaining valuables like information, access, or money.
                        </p>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section">
        <div class="container page__container">
            <div class="page-headline text-center space">
                <h2>Social Engineering Prevention</h2>
                <br><br>
                <div style="text-align: center;">
                    <img class="img-social-engineering2 " src="/assets/images/prevention.webp">
                    <br><br>
                    <blockquote class="blockquote">
                        <p class="mb-0 text-align-SE2">1. Don’t open emails and attachments from suspicious sources.
                            <br>
                            2. Use multi-factor authentication. 
                            <br>
                            3. Use strong passwords (and a password manager).
                            <br>
                            4. Avoid sharing names of your schools, pets, place of birth, or other personal details. 
                            <br>
                            5. Keep your antivirus/antimalware software updated.
                        </p>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section">
        <div class="container page__container">
            <div class="page-headline text-center space">
                <h2>Feedback</h2>
                <blockquote class="blockquote">
                        <p class="mb-0 text-align-SE2">What other students turned professionals have to say about us <br>after learning with us and reaching their goals.
                        </p>
                    </blockquote>
               
            </div>

            <div class="position-relative carousel-card">
                <div class="row d-block js-mdk-carousel" id="carousel-feedback">
                    <a class="carousel-control-next js-mdk-carousel-control mt-n24pt" href="#carousel-feedback" role="button" data-slide="next">
                        <span class="carousel-control-icon material-icons" aria-hidden="true">keyboard_arrow_right</span>
                        <span class="sr-only">Next</span>
                    </a>
                    <div class="mdk-carousel__content">

                        <div class="col-12 col-md-6">
                            <div class="card card--elevated card-body">
                                <blockquote class="mb-0">
                                    <p class="text-70">A great web quest platform to learn about social engineering. I think it is important to be aware of the many ways one can be 
                                        socially engineered.</p>

                                    <div class="media">
                                        <div class="media-left">
                                            <img src="assets/images/people/110/guy-1.jpg" width="40" alt="avatar" class="rounded-circle">
                                        </div>
                                        <div class="media-body media-middle">
                                            <p class="mb-0"><a href="" class="text-body"><strong>Alex Lincoln</strong></a></p>
                                            <div class="rating">
                                                <span class="rating__item"><span class="material-icons">star</span></span>
                                                <span class="rating__item"><span class="material-icons">star</span></span>
                                                <span class="rating__item"><span class="material-icons">star</span></span>
                                                <span class="rating__item"><span class="material-icons">star</span></span>
                                                <span class="rating__item"><span class="material-icons">star_border</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="card card--elevated card-body">
                                <blockquote class="mb-0">
                                    <p class="text-70">I had fun social engineering lecturers and students and I have also learned how hackers perform social engineering attacks on a daily basis.</p>

                                    <div class="media">
                                        <div class="media-left">
                                            <img src="assets/images/people/110/guy-2.jpg" width="40" alt="avatar" class="rounded-circle">
                                        </div>
                                        <div class="media-body media-middle">
                                            <p class="mb-0"><a href="" class="text-body"><strong>Chris Jamal</strong></a></p>
                                            <div class="rating">
                                                <span class="rating__item"><span class="material-icons">star</span></span>
                                                <span class="rating__item"><span class="material-icons">star</span></span>
                                                <span class="rating__item"><span class="material-icons">star</span></span>
                                                <span class="rating__item"><span class="material-icons">star</span></span>
                                                <span class="rating__item"><span class="material-icons">star</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="card card--elevated card-body">
                                <blockquote class="mb-0">
                                    <p class="text-70">This website allowed me to learn the many ways one can be social engineered. <br><br></p>

                                    <div class="media">
                                        <div class="media-left">
                                            <img src="assets/images/people/110/woman-1.jpg" width="40" alt="avatar" class="rounded-circle">
                                        </div>
                                        <div class="media-body media-middle">
                                            <p class="mb-0"><a href="" class="text-body"><strong>Emily Stone</strong></a></p>
                                            <div class="rating">
                                                <span class="rating__item"><span class="material-icons">star</span></span>
                                                <span class="rating__item"><span class="material-icons">star</span></span>
                                                <span class="rating__item"><span class="material-icons">star</span></span>
                                                <span class="rating__item"><span class="material-icons">star</span></span>
                                                <span class="rating__item"><span class="material-icons">star_border</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="card card--elevated card-body">
                                <blockquote class="mb-0">
                                    <p class="text-70">It is very important to be aware of the many ways one can be social engineered while working. <br><br> </p>

                                    <div class="media">
                                        <div class="media-left">
                                            <img src="assets/images/people/110/woman-5.jpg" width="40" alt="avatar" class="rounded-circle">
                                        </div>
                                        <div class="media-body media-middle">
                                            <p class="mb-0"><a href="" class="text-body"><strong>Susan Carpenter</strong></a></p>
                                            <div class="rating">
                                                <span class="rating__item"><span class="material-icons">star</span></span>
                                                <span class="rating__item"><span class="material-icons">star</span></span>
                                                <span class="rating__item"><span class="material-icons">star</span></span>
                                                <span class="rating__item"><span class="material-icons">star</span></span>
                                                <span class="rating__item"><span class="material-icons">star</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection