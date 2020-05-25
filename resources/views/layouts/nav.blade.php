<nav class="navbar navbar-expand-lg fixed-top bg-danger ">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="{{ route('frontend.landing') }}" rel="tooltip" title="Coded by Creative Tim" data-placement="bottom" target="_blank">
                Coursaat
            </a>
            <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <div class="btn-group">
                        <a  class="nav-link dropdown-toggle" data-toggle="dropdown" >
                            Categories
                        </a>
                        <div class="dropdown-menu">
                            @foreach($categories as $category)
                                <a class="dropdown-item" href="{{ route('front.category', ['id' => $category->id]) }}">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="btn-group">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                            Skills
                        </a>
                        <div class="dropdown-menu">
                            @foreach($skills as $skill)
                                <a class="dropdown-item" href="{{ route('front.skill', ['id' => $skill->id]) }}">{{ $skill->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
