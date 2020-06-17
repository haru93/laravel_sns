<nav class="navbar navbar-expand navbar-dark blue-gradient">

  <a class="navbar-brand" href="/"><i class="far fa-sticky-note mr-1"></i>Memo</a>

  <ul class="navbar-nav ml-auto">

    @guest {{--この行を追加--}}
    <li class="nav-item">
      <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a> {{--この行を変更--}}
    </li>
    @endguest {{--この行を追加--}}

    @guest {{--この行を追加--}}
    <li class="nav-item">
      <a class="nav-link" href="">ログイン</a>
    </li>
    @endguest {{--この行を追加--}}
      
    @auth {{--この行を追加--}}
    <li class="nav-item">
      <a class="nav-link" href=""><i class="fas fa-pen mr-1"></i>投稿する</a>
    </li>
    @endauth {{--この行を追加--}}
    
    @auth {{--この行を追加--}}
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
         aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <button class="dropdown-item" type="button"
                onclick="location.href=''">
          マイページ
        </button>
        <div class="dropdown-divider"></div>
        <button form="logout-button" class="dropdown-item" type="submit">
          ログアウト
        </button>
      </div>
    </li>
    <form id="logout-button" method="POST" action="{{ route('logout') }}"> {{--この行を編集--}}
      @csrf {{--この行を追加--}}
    </form>
    <!-- Dropdown -->
    @endauth {{--この行を追加--}}

  </ul>

</nav>

{{-- @guest, @auth
@guestから@endguestに囲まれた部分は、ユーザーがまだログインしていない状態の時のみ処理されます。
逆に@authから@endauthに囲まれた部分は、ユーザーがログイン済みの状態の時のみ処理されます。
これらを使って、ログイン前、ログイン済みそれぞれで見せるべきメニュー、見せるべきでないメニューを出し分けるようにしました。 --}}

{{-- なお、今回ログアウトのbuttonタグをformタグの配下に置かないようにしています。
この理由は、ドロップダウンメニューのliタグ内にformタグを配置すると、
本教材で使用しているMDBootstrapの仕様でドロップダウンメニューのレイアウトが崩れてしまう(横幅が大きくなる)ためです。
そこで、formタグはliタグの外に配置し、formタグのid属性と、buttonタグのform属性それぞれに"logout-button"という値を与え、
両者を関連付けるようにしています。 --}}