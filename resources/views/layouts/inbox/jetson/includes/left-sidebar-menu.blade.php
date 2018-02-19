		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
				<li class="navigation-header">
					<span>Main</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
				<li>
					<a href="{{ route('inbox') }}" {{\App\Helpers\Helpers::setActive('inbox')}}><div class="pull-left"><i class="zmdi zmdi-inbox mr-20"></i><span class="right-nav-text">Inbox</span></div><div class="pull-right"><span class="label label-danger">8</span></div><div class="clearfix"></div></a>
				</li>
				<li>
					<a href="{{ route('sended') }}" {{\App\Helpers\Helpers::setActive('sended')}}><div class="pull-left"><i class="zmdi zmdi-email-open mr-20"></i><span class="right-nav-text">Sent Mail</span></div><div class="pull-right"><span class="label label-info">8</span></div><div class="clearfix"></div></a>
				</li>
				<li>
					<a href="{{ route('trashed') }}" {{\App\Helpers\Helpers::setActive('trashed')}}><div class="pull-left"><i class="zmdi zmdi-delete mr-20"></i><span class="right-nav-text">Trash</span></div><div class="pull-right"><span class="label label-primary">8</span></div><div class="clearfix"></div></a>
				</li>
			</ul>
		</div>