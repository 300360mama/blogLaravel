
@section('banner')
    <div class="banner">

        <div class="slideWrapper">
            <div class="imgWrapper activeImg">
                <img class="slideImg" src="/images/header/banner1.jpg" alt="">
            </div>
            <div class="imgWrapper ">
                <img class="slideImg" src="/images/header/banner2.jpg" alt="">
            </div>
            <div class="imgWrapper ">
                <img class="slideImg" src="/images/header/banner3.jpg" alt="">
            </div>
        </div>


        <section class="bannerNews">
            <span>Latest News</span>
            <h6>Знание есть сила, сила есть знание.</h6>
        </section>
        <section class="switchSlide">
            <section class="box">
                <span class="rectangle active"></span>
                <span class="rectangle"></span>
                <span class="rectangle "></span>
            </section>
            <section class="switch">
                <span class="fa fa-long-arrow-up next arrow" ></span>
                <span class="text">Article Featured</span>
                <span class="fa fa-long-arrow-down prev arrow disable" ></span>
            </section>
        </section>
    </div>
@endsection
