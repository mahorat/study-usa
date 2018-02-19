											<aside class="col-lg-9 col-md-8 pl-0">
												<div class="panel panel-refresh pa-0">
													<div class="refresh-container">
														<div class="la-anim-1"></div>
													</div>
													<div class="panel-heading pt-20 pb-20 pl-15 pr-15">
														<div class="pull-left">
															<h6 class="panel-title txt-dark">inbox</h6>
														</div>
														<div class="clearfix"></div>
													</div>
													<form action="{{route('checkbox')}}" method="POST" display="hidden">
														{{csrf_field()}}
													<div class="panel-wrapper collapse in">
														<div class="panel-body inbox-body pa-0">
															<div class="mail-option pl-15 pr-15">
																<div class="chk-all">
																	<div class="checkbox checkbox-default inline-block">
																		<input type="checkbox" onClick="selectAll(this)" id="checkbox051"/>
																		<label for="checkbox051"></label>
																	</div>
																	<div class="btn-group">
																		<a data-toggle="dropdown" href="#" class="btn  all" aria-expanded="false">
																		All
																		<i class="fa fa-angle-down "></i>
																		</a>
																		<style type="text/css">
																			#actionButton{
																				border: 0;
																				background-color: #fff;
																				margin-left: 14px;
																				color: #212121;
																			}
																		</style>
																		<ul class="dropdown-menu">
																			<li><button name="button" type="submit" value="trash" id="actionButton"> Trash</button></li>
																			<li><button name="button" type="submit" value="read" id="actionButton"> Read</button></li>
																			<li><button name="button" type="submit" value="unread" id="actionButton"> Unread</button></li>
																		</ul>
																	</div>
																	<div class="btn-group">
																		<a data-toggle="dropdown" href="#" class="btn  blue">
																		Move to
																		<i class="fa fa-angle-down "></i>
																		</a>
																		<ul class="dropdown-menu">
																			<li><a href="#">Personal</a></li>
																			<li><a href="#">Social</a></li>
																			<li class="divider"></li>
																			<li><a href="#">Promotional</a></li>
																			<li class="divider"></li>
																			<li><a href="#">Updates</a></li>
																		</ul>
																	</div>
																	<div class="btn-group">
																		<a data-toggle="dropdown" href="#" class="btn  blue" aria-expanded="false">
																		More
																		<i class="fa fa-angle-down "></i>
																		</a>
																	</div>
																</div>
																{{ $messages->render("layouts/inbox/jetson/includes.pagination") }}
															</div>
															<div class="table-responsive mb-0">
																<table class="table table-inbox table-hover mb-0">
																	<tbody>
																	@if(count($messages) > 0)
																		@foreach($messages as $message)
																		<tr @if($message->seen == 0) class="unread"
																			@elseif($message->seen == 1) class=""
																			@endif
																			>
																			<td class="inbox-small-cells">
																				<div class="checkbox checkbox-default inline-block">
																					<input type="checkbox" id="checkbox012" name="messages[]"  value="{{encrypt($message->id)}}"/>
																					<label for="checkbox012"></label>
																				</div>
																				<a href="{{route('trash').'/'.encrypt($message->id)}}"><i class="zmdi zmdi-delete inline-block font-16"></i></a>
																			</td>
																			<td class="view-message  dont-show"><a href="{{ route('message'). '/' .encrypt($message->id) }}">{{\App\Helpers\User::user($message['sender'])->email}}</a>@if($message->seen == 0)<span class="label label-warning pull-right">new</span>@endif</td>
																			<td class="view-message ">{{\App\Helpers\Helpers::short_text($message['subject'], 30)}}<span style="color:#B2B2B2; font-weight: normal;"> {{\App\Helpers\Helpers::short_text($message['message'], 45)}}</span></td>
																			<td class="view-message  text-right">
																				@if($message->seen == 1)<i class="zmdi zmdi-eye inline-block mr-15 font-16"></i>@endif
																				<span  class="time-chat-history inline-block">{{ \App\Helpers\Helpers::dateDiff($message['created_at']) }}</span>
																			</td>
																		</tr>
																		@endforeach
																	@endif
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</form>
												</div>
											</aside>