@extends('frontend.theme.master')

@section('content')
<div class="btn-next-step">
	<button onclick="showModal()" type="button" class="btn btn-green" name="button">ดำเนินการขั้นตอนถัดไป</button>
</div>
<style media="screen">
	.layout_noselect .checkmark{
		top: -8px;
    		left: 0;
	}
	.img-person2f img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}.btn-next-step {
    top: 65vh;
}
</style>
<div id="wrapper2f">
	<div class="insitepage2f">
		<div class="navication2f">
			<div class="container">
				<ol class="breadcrumb">
					<li><a href="">หน้าหลัก</a></li>
					<li><a href="">ประกาศผล</a></li>
					<li class="active">การลงคะแนนคัดเลือกคณะกรรมการสุขภาพแห่งชาติ</li>
				</ol>
			</div>
		</div>
		<div class="insite-banner2f">
			<div class="control-bannertext2f">
				<div class="container">
					<div class="headline2f">
						<h1>การลงคะแนน</h1>
					</div>
				</div>
				<!--end container-->
			</div>
			<!--end control-bannertext2f-->
			<div class="img-banner2f">
				<img src="{{ asset("frontend/images/insite-banner03.jpg") }}" alt="">
			</div>
			<div class="bg-banner"><img src="{{ asset("frontend/images/bg-banner.png") }}" alt=""></div>
			<div class="shape-banner"></div>
		</div>

		<div class="control-insitepage2f">
			<div class="container">

				<div class="layout_noselect">
					<label class="checkbox2f">ไม่ประสงค์ลงคะแนน
						<input class="no-vote" type="checkbox">
						<span class="checkmark"></span>
					</label>
				</div>

				<div class="wrapper_list_slate2 " style="display:none">
					<h1>ไม่ประสงค์ลงคะแนน</h1><br>
					<div class="text-election01">ท่านได้เลือก ไม่ประสงค์ลงคะแนน ถ้าท่านต้องการกลับไปเลือกผู้สมัครให้กดที่ปุ่ม กลับไปหน้าลงคะแนน </div>
					<div class="text-election02">หากท่าน ยืนยัน ที่จะไม่ประสงค์ลงคะแนน ให้กดที่ปุ่ม ดำเนินการขั้นตอนถัดไป</div>
					<div><a href="" class="btn btn-green">กลับไปหน้าลงคะแนน</a></div>	
					
				</div>
				<div class="wrapper_list_slate">
					<div class="row">
						@foreach($members as $key => $member)
						<div class="col-sm-4 col-xs-6">
							<div class="layout_list_slate">
								<div class="img-person2f square">
									<span><img src="{{asset($member->getAvatar())}}" alt=""></span>
								</div>
								<div class="name-person2f">
									<span>{{$member->nameTitle}}{{$member->firstname}}</span> <span>{{$member->lastname}}</span>
								</div>
								<div class="layout_number_slate">
									<span>หมายเลข</span>
									<strong>{{$member->candidateNumber}}</strong>
								</div>
								<div class="layout_select_slate">
									<label class="checkbox2f">
										<input type="checkbox">
										<span class="checkmark modal-vote" data-id="{{$member->id}}" data-number="{{$member->candidateNumber}}" data-name="{{$member->nameTitle}}{{$member->firstname}} {{$member->lastname}}" data-img="{{asset($member->getAvatar())}}"></span>
									</label>
								</div>
							</div>
						</div> <!-- Box Member  -->
						@endforeach

					</div>
				</div>
			</div>
			<!--end container-->
		</div>
	</div>
</div>

<!-- modal -->

<div class="popup2f">

	<!-- step 1 -->
	<div class="modal fade" data-keyboard="false" data-backdrop="static" id="modal-vote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="{{asset('frontend/images/close-purple.svg')}}" alt=""></button>
				<div class="modal-body">
					<div class="content-popup2f">
						<h4>การลงคะแนนคัดเลือกคณะกรรมการสุขภาพแห่งชาติ</h4>
						<div class="content-table-list2f table-purple">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th width="10%" class="t-center2f"><span>ลำดับ</span></th>
											<th width="12%" class="t-center2f"><span>หมายเลข<br>เลือกตั้ง</span></th>
											<th width="78%" colspan="2"><span class="paddingleft20">ชื่อ - นามสกุล</span></th>
										</tr>
									</thead>
									<tbody class="addVoteBody">


									</tbody>
								</table>
							</div>
							<!--end table-responsive-->
						</div>
						<!--end content-table-list2f-->
						<div class="btn-center-nonefix">
							<button type="button" name="button" id="modal-clear-cadidate" class="btn btn btn-purple">เลือกผู้สมัครใหม่</button>
							{{-- <button type="button" name="button" id="modal-clear-cadidate" class="btn btn btn-border">เลือกผู้สมัครใหม่</button>
							<button type="button" name="button" id="modal-add-cadidate"  class="btn btn btn-border">เลือกผู้สมัครเพิ่ม +</button> --}}
							<button type="button" name="button" id="modal-save-cadidate"  class="btn btn-green">บันทึก</button>
						</div>
					</div>
					<!--end content-popup2f-->
				</div>
				<!--end modal-body-->
			</div>
			<!--end modal-content-->
		</div>
	</div>
	<!--end modal-->


	<!-- step 2 -->
	<div class="modal fade" id="modal-vote-2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="{{asset('frontend/images/close-purple.svg')}}" alt=""></button>
				<div class="modal-body">
					<div class="content-popup2f">
						<h4>การลงคะแนนคัดเลือกคณะกรรมการสุขภาพแห่งชาติ</h4>
						<div class="content-table-list2f table-purple">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th width="15%" class="t-center2f"><span>ลำดับ</span></th>
											<th width="15%" class="t-center2f"><span>หมายเลข</span></th>
											<th width="70%" colspan="2"><span class="paddingleft20">ชื่อ - นามสกุล</span></th>
										</tr>
									</thead>
									<form class="" id="sendMember" action="" method="post">
										<tbody class="addVoteBody">


										</tbody>
									</form>
								</table>
							</div><!--end table-responsive-->
						</div><!--end content-table-list2f-->
						<div class="text-warning2f">(กรุณาตรวจสอบความถูกต้องและเรียงลำดับการลงคะแนนก่อนยืนยันการลงคะแนน)</div>
						<div class="btn-center-nonefix">
							<button id="step2ChangeNumber" type="button" name="button" class="btn btn btn-purple">ปรับการเรียงลำดับ</button>
							<button id="step2Confirm" type="button" name="button" class="btn btn-green">ยืนยันการลงคะแนน</button>
						</div>
					</div><!--end content-popup2f-->
				</div><!--end modal-body-->
			</div><!--end modal-content-->
		</div>
	</div><!--end modal-->


	<!-- step 3 -->
	<div class="modal fade" id="modal-vote-3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="images/close-purple.svg" alt=""></button>
				<div class="modal-body">
					<div class="content-popup2f">
						<h4>การลงคะแนนคัดเลือกกันเองเป็นกรรมการสุขภาพแห่งชาติ</h4>
						<div class="content-table-list2f table-purple">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th width="10%" class="t-center2f"><span>ลำดับ</span></th>
											<th width="12%" class="t-center2f"><span>หมายเลข<br>เลือกตั้ง</span></th>
											<th width="78%" ><span class="paddingleft20">ชื่อ - นามสกุล</span></th>
										</tr>
									</thead>
									<tbody class="addVoteBody">

									</tbody>
								</table>
							</div><!--end table-responsive-->
						</div><!--end content-table-list2f-->
						<div class="text-sucess2f">
							ท่านได้ลงคะแนนเรียบร้อยแล้ว
						</div>
						<div class="btn-center">
							<a href="" class="btn btn-purple">กลับไปหน้าหลัก</a>
						</div>
					</div><!--end content-popup2f-->
				</div><!--end modal-body-->
			</div><!--end modal-content-->
		</div>
	</div><!--end modal-->
	<div class="modal fade" id="modal-no-vote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="images/close-purple.svg" alt=""></button>
				<div class="modal-body">
					<div class="content-popup2f">
						<h4>การลงคะแนนคัดเลือกคณะกรรมการสุขภาพแห่งชาติ</h4>
						<div class="content-table-list2f table-purple">

						</div><!--end content-table-list2f-->
						<div class="text-sucess2f">
							ท่านยืนยันไม่ประสงค์ลงคะแนนหรือไม่ ?
						</div>
						<div class="btn-center-nonefix">
							<a id="" onclick="$('#modal-no-vote').modal('hide')" type="button" name="button" class="btn btn btn-purple">ยกเลิก</a>
							<a id="step2Confirm" href="{{ url('no-vote') }}" name="button" class="btn btn-green">ยืนยันการลงคะแนน</a>
							</div>
						</div><!--end content-popup2f-->
					</div><!--end modal-body-->
				</div><!--end modal-content-->
			</div>
		</div><!--end modal-->
	</div>
	@endsection


	@section('js')
	<script type="text/javascript">
	var number_score 		= 1;
	function showModal() {
		if($('.no-vote').prop('checked')) {
			$('#modal-no-vote').modal('show')
		}else {
			$('#modal-vote').modal('show')
		}
	}
	$(function() {
		var addVoteBody 		= $("#modal-vote .addVoteBody");
		var addVoteBodyTwo 		= $("#modal-vote-2 .addVoteBody");
		var addVoteBodyThree	= $("#modal-vote-3 .addVoteBody");
		var modalVote			= $("#modal-vote");
		var modalVoteStepTwo	= $("#modal-vote-2");
		var modalVoteStepThree	= $("#modal-vote-3");

		$(".no-vote").on('change', function() {
			$('.wrapper_list_slate').fadeToggle();
			$('.wrapper_list_slate2').fadeToggle();
			$('#modal-clear-cadidate').click()
		})
		// Add vote member to modal
		function modalAddVoteStep2(number_score, candidateNumber, pic, fullName, id)
		{
			return '<tr data-id="'+ id +'" data-candidate="' + candidateNumber +'" data-number="'+ number_score +'" data-name="'+ fullName +'" data-img="'+ pic +'">'+
			'<td width="15%" class="t-center2f"><span><span>'+
			'<div class="box-order2f">'+
			'<label for="">เลือกลำดับ</label>'+
			'<select class="form-control changeNumber" name="">'+
			'<option value="1" '+ (number_score == 1 ? "selected" : "") +'>1</option>'+
			'<option value="2" '+ (number_score == 2 ? "selected" : "") +'>2</option>'+
			'<option value="3" '+ (number_score == 3 ? "selected" : "") +'>3</option>'+
			'</select>'+
			'<input type="hidden" name="idMember['+ id +']" value="'+ id +'">'+
			'<input type="hidden" name="candidateNumber['+ id +']" value="'+ candidateNumber +'">'+
			'<input type="hidden" name="number_score['+ id +']" value="'+ Math.abs((number_score - 4)) +'">'+
			'</div>'+
			'</span></span></td>'+
			'<td width="15%" class="t-center2f"><span>' + candidateNumber + '</span></td>'+
			'<td width="50%">'+
			'<div class="box-td-name2f">'+
			'<div class="img-person2f square">'+
			'<span><img src="'+ pic +'" alt=""></span>'+
			'</div>'+
			'<div class="text-name2f">' + fullName +  '</div>'+
			'</div>'+
			'</td>'+
		
			'</tr>';
		}
		function modalAddVote(number_score, candidateNumber, pic, fullName, id)
		{
			return '<tr data-id="'+ id +'" data-candidate="' + candidateNumber +'" data-number="'+ number_score +'" data-name="'+ fullName +'" data-img="'+ pic +'">'+
			'<td width="10%" class="t-center2f"><span>' + number_score + '</span></td>'+
			'<td width="12%" class="t-center2f"><span>' + candidateNumber + '</span></td>'+
			'<td width="78%">'+
			'<div class="box-td-name2f">'+
			'<div class="img-person2f square">'+
			'<span><img src="'+ pic +'" alt=""></span>'+
			'</div>'+
			'<div class="text-name2f">' + fullName +  '</div>'+
			'</div>'+
			'</td>'+
			'</tr>';
		}

		// Method Add body
		function modalClear()
		{
			addVoteBody.html('');
			addVoteBodyTwo.html('');
			addVoteBodyThree.html('');
		}
		$(document).on('change', ".changeNumber", function() {
			$(this).parents('tr').attr('data-number', $(this).val());
		});


		$('#step2ChangeNumber').on('click', function() {
			var number = [];
			$.each(addVoteBodyTwo.find('tr'), function(k, v) {
				number.push(parseInt($(v).data('number')));
			});

			var recipientsArray = number.sort();

			var reportRecipientsDuplicate = [];
			for (var i = 0; i < recipientsArray.length - 1; i++) {
				if (recipientsArray[i + 1] == recipientsArray[i]) {
					reportRecipientsDuplicate.push(recipientsArray[i]);
				}
			}

			if(reportRecipientsDuplicate.length == 0)
			{
				var numList = $("#modal-vote-2 .addVoteBody tr").length;
				addVoteBody.html('');
				addVoteBodyThree.html('');
				for (var i = 1; i <= numList; i++) {
					var valueSet		= $("#modal-vote-2 .addVoteBody tr[data-number='" + i + "']");
					var element 		= modalAddVote(i, $(valueSet).data('candidate'), $(valueSet).data('img'), $(valueSet).data('name'), $(valueSet).data('id'));
					addVoteBody.append( element );
					addVoteBodyThree.append( element );
				}

				addVoteBodyTwo.html('');
				for (var i = 1; i <= numList; i++) {
					var valueSet		= $("#modal-vote .addVoteBody tr[data-number='" + i + "']");
					console.log(valueSet)
					var element 		= modalAddVoteStep2(i, $(valueSet).data('candidate'), $(valueSet).data('img'), $(valueSet).data('name'), $(valueSet).data('id'));
					addVoteBodyTwo.append( element );
				}
			}
		});
		$(document).on('click', ".btn-delete-vote" ,function(){
			var element = $(this);
			if(confirm('ยืนยันการทำรายการ')) {
				console.log($('.checkmark[data-id="' + element.parents('tr').attr('data-id') + '"]'))
				$('.checkmark[data-id="' + element.parents('tr').attr('data-id') + '"]').prev().prop("checked", false);
				$('.checkmark[data-id="' + element.parents('tr').attr('data-id') + '"]').prev().trigger('change')
				$('tr[data-id="' + element.parents('tr').attr('data-id') + '"]').remove();
				element.parents('tr').remove()
				number_score--;
			}

		});
		$("#step2Confirm").on('click', function() {
			modalVoteStepThree.modal('show')
			modalVoteStepTwo.modal('hide')

			var dataSet = $("#modal-vote-2 .addVoteBody :input").serialize();
			$.ajax({
				url: '{{url('election/vote')}}',
				type: 'POST',
				dataType: 'json',
				data: dataSet
			})
			.done(function(d) {
				addVoteBody.html('');
				addVoteBodyTwo.html('');
				$('.modal-vote').prev().removeAttr('checked').trigger('change');
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				// console.log("complete");
			});


		});
		$("#modal-save-cadidate").on('click', function() {
			if(number_score > 1) {

				modalVoteStepTwo.modal('show');
				modalVote.modal('hide');
			}
		})

		$('.modal-vote').on('click', function() {
			var element 		= modalAddVote(number_score, $(this).data('number'), $(this).data('img'), $(this).data('name'), $(this).data('id'));
			var element2 		= modalAddVoteStep2(number_score, $(this).data('number'), $(this).data('img'), $(this).data('name'), $(this).data('id'));
			var idMember 		= $(this).data('id');
			var checkHasMembers = true;
			$.each(addVoteBody.find('tr'), function(k,v){
				if($(v).data('id') == idMember) {
					checkHasMembers = false;
				}
			});

			if(checkHasMembers)
			{
				if(number_score <= 3)
				{

					addVoteBody.append( element );
					addVoteBodyTwo.append( element2 )
					addVoteBodyThree.append( element );

					number_score++;
				}
				else
				{
					// $('.modal-vote').prev("input:not(:checked)").attr('disabled', 'true')
				}

			} else {
				$.each(addVoteBodyThree.find('tr'), function(k,v){
					if($(v).data('id') == idMember) {
						$(v).remove();
					}
				});
				$.each(addVoteBody.find('tr'), function(k,v){
					if($(v).data('id') == idMember) {
						$(v).remove();
					}
				});
				$.each(addVoteBodyTwo.find('tr'), function(k,v){
					if($(v).data('id') == idMember) {
						$(v).remove();
					}
				});

				number_score-- ;
			}
			if($('.modal-vote').prev("input:checked").length >= 3) {
				$('.modal-vote').prev("input:not(:checked)").attr('disabled', 'true')
			} else {
				$('.modal-vote').prev("input").removeAttr('disabled')
			}
			// modalVote.modal('show');
		});
		$('#modal-clear-cadidate').on('click', function() {
			number_score = 1;
			modalClear();

			// $('.modal-vote').prev().removeAttr('disabled')
			$('.modal-vote').prev().removeAttr('checked').trigger('change');
		});
		$("#modal-add-cadidate").on('click', function() {
			if(number_score <= 3)
			{
				modalVote.modal('hide')
			}

		});

	});
</script>
@endsection
