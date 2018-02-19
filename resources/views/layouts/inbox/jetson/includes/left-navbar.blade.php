											<aside class="col-lg-3 col-md-4 pr-0">
												<div class="mt-20 mb-20 ml-15 mr-15">
													<a href="{{ route('compose') }}" data-toggle="modal"  title="Compose"    class="btn btn-success btn-block">
														Compose
													</a>
												</div>
												<ul class="inbox-nav mb-30">
													<li {{\App\Helpers\Helpers::setActive('inbox')}}>
														<a href="{{ route('inbox') }}">
															<i class="zmdi zmdi-inbox"></i> Inbox
															<span class="label label-danger ml-10">{{ ($new > 0) ? $new : $null }}</span>
														</a>
													</li>
													<li {{\App\Helpers\Helpers::setActive("sended")}}>
														<a href="{{ route('sended') }}">
															<i class="zmdi zmdi-inbox"></i> Sent Mail
															<span class="label label-default ml-10">{{ ($sended > 0) ? $sended : $null }}</span>	
														</a>
													</li>
													<li>
														<a href="#"><i class="zmdi zmdi-bookmark-outline"></i> Important</a>
													</li>
													<li>
														<a href="#"><i class="zmdi zmdi-folder-outline"></i> Drafts <span class="label label-info ml-10">30</span></a>
													</li>
													<li {{\App\Helpers\Helpers::setActive('trashed')}}>
														<a href="{{ route('trashed') }}"><i class="zmdi zmdi-delete"></i> Trash
															<span class="label label-default ml-10">{{ ($trashed > 0) ? $trashed : $null }}</span>
														</a>
													</li>
												</ul>
											</aside>