<!-- main-sidebar -->
<head>
	<style>
	</style>
</head>
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll">
			<div class="main-sidebar-header active">
				<a class="desktop-logo logo-light active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/faces/logo.png')}}" class="main-logo" alt="logo"></a>
				<a class="desktop-logo logo-dark active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/faces/logo.png')}}" class="main-logo dark-theme" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/faces/logo.png')}}" class="logo-icon" alt="logo"></a>
			</div>
			<div class="main-sidemenu">

				<div class="app-sidebar__user clearfix">
					<div class="dropdown user-pro-body">
						<div class="">
							<img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('assets/img/faces/user.png')}}"><span class="avatar-status profile-status bg-green"></span>
						</div>
						<div class="user-info">
							<h4 class="font-weight-semibold mt-3 mb-0">{{ Auth::user()->name }}</h4>
							<span class="mb-0 text-muted">{{ Auth::user()->email }}</span>
						</div>
					</div>
				</div>

				<ul class="side-menu">
					<li class="side-item side-item-category" style="letter-spacing: 0px;">نظام تحضير الطلاب</li>
					@can('الرئيسية')
						<li class="slide">
							<a class="side-menu__item" href="{{ url('/' . $page='home') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/><path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/></svg><span class="side-menu__label">الرئيسية</span></a>
						</li>
					@endcan
					

					@can('قائمة_تقارير_الطلاب')
					<li class="side-item side-item-category">الطلاب</li>
					<li class="slide" >
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/><path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/></svg><span class="side-menu__label">قائمة الطلاب</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							@can('كل_الطلاب')
								<li><a class="slide-item" href="{{ url('/' . $page='studants') }}">كل الطلاب</a></li>
							@endcan
							@can('طلاب_مستمرين')
								<li><a class="slide-item" href="{{ url('/' . $page='rep1') }}">طلاب مستمرين</a></li>
							@endcan
							@can('طلاب_منقطعين')
								<li><a class="slide-item" href="{{ url('/' . $page='rep2') }}">طلاب منقطعين</a></li>
							@endcan
						</ul>
					</li>

					@endcan

					@can('تقرير_الحضور_والغيب')
					<li class="side-item side-item-category">تقرير الحضور والغيب</li>
					<li class="slide" >
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/><path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/></svg><span class="side-menu__label">الحضور و الغياب</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
								<li><a class="slide-item" href="{{ url('/' . $page='requests/cards') }}">عرض الحضور الغياب</a></li>
						</ul>
					</li>
					@endcan

					@can('المستخدمين')
						<li class="side-item side-item-category">المستخدمين</li>
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3"/><path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z"/></svg><span class="side-menu__label">المستخدمين</span><i class="angle fe fe-chevron-down"></i></a>
							<ul class="slide-menu">
								@can('قائمة_المستخدمين')
									<li><a class="slide-item" href="{{ url('/' . $page='users') }}">قائمة المستخدمين</a></li>
								@endcan
								@can('صلاحيات المستخدمين')
									<li><a class="slide-item" href="{{ url('/' . $page='roles') }}">صلاحية المستخدمين</a></li>
								@endcan
							</ul>
						</li>
					@endcan
				</ul>
			</div>
		</aside>
<!-- main-sidebar -->