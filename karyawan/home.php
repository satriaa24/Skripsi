<?php
//including the database koneksi file
include_once("./../views/config.php");
//fetching data in descending order (lastest entry first)
$kriteria = mysqli_query($mysqli, "SELECT * FROM tb_kriteria  ");
$kriteria = mysqli_num_rows($kriteria);

$karyawan = mysqli_query($mysqli, "SELECT * FROM tb_alternatif where hak_akses = 'karyawan' ");
$karyawan = mysqli_num_rows($karyawan);

$penilaian = mysqli_query($mysqli, "SELECT * FROM tb_relasi  ");
$penilaian = mysqli_num_rows($penilaian);

?>

<div class="row">
    <!-- <div class="col-xl-3 col-xxl-6 col-sm-6">
						<div class="card bg-primary">
							<div class="card-body">
								<div class="media align-items-center">
									<span class="p-3 mr-3 feature-icon rounded">
										<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M30.25 5.75H28.5V2.25C28.5 1.78587 28.3156 1.34075 27.9874 1.01256C27.6593 0.684374 27.2141 0.5 26.75 0.5C26.2859 0.5 25.8407 0.684374 25.5126 1.01256C25.1844 1.34075 25 1.78587 25 2.25V5.75H11V2.25C11 1.78587 10.8156 1.34075 10.4874 1.01256C10.1592 0.684374 9.71413 0.5 9.25 0.5C8.78587 0.5 8.34075 0.684374 8.01256 1.01256C7.68437 1.34075 7.5 1.78587 7.5 2.25V5.75H5.75C4.35761 5.75 3.02226 6.30312 2.03769 7.28769C1.05312 8.27226 0.5 9.60761 0.5 11V12.75H35.5V11C35.5 9.60761 34.9469 8.27226 33.9623 7.28769C32.9777 6.30312 31.6424 5.75 30.25 5.75Z" fill="white"/>
											<path d="M0.5 30.25C0.5 31.6424 1.05312 32.9777 2.03769 33.9623C3.02226 34.9469 4.35761 35.5 5.75 35.5H30.25C31.6424 35.5 32.9777 34.9469 33.9623 33.9623C34.9469 32.9777 35.5 31.6424 35.5 30.25V16.25H0.5V30.25Z" fill="white"/>
										</svg>
									</span>
									<div class="media-body text-right">
										<p class="fs-18 text-white mb-2">Data Kriteria</p>
										<span class="fs-48 text-white font-w600"><?php echo $kriteria ; ?></span>
									</div>
								</div>
							</div>
						</div>
					</div> -->
    <div class="col-xl-3 col-xxl-6 col-sm-6">
        <div class="card bg-info">
            <div class="card-body">
                <div class="media align-items-center">
                    <span class="p-3 mr-3 feature-icon rounded">
                        <svg width="36" height="36" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M38.4998 10.4995H35.0002V38.4999H38.4998C40.4245 38.4999 42 36.9238 42 34.9992V13.9992C42 12.075 40.4245 10.4995 38.4998 10.4995Z"
                                fill="white" />
                            <path
                                d="M27.9998 10.4995V6.9998C27.9998 5.07515 26.4243 3.49963 24.5001 3.49963H17.4998C15.5756 3.49963 14.0001 5.07515 14.0001 6.9998V10.4995H10.5V38.4998H31.5V10.4995H27.9998ZM24.5001 10.4995H17.4998V6.99929H24.5001V10.4995Z"
                                fill="white" />
                            <path
                                d="M3.50017 10.4995C1.57551 10.4995 0 12.075 0 13.9997V34.9997C0 36.9243 1.57551 38.5004 3.50017 38.5004H6.99983V10.4995H3.50017Z"
                                fill="white" />
                        </svg>
                    </span>
                    <div class="media-body text-right">
                        <p class="fs-18 text-white mb-2">Seluruh Jumlah Penilaian</p>
                        <span class="fs-48 text-white font-w600"><?php echo $penilaian; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-xxl-6 col-sm-6">
        <div class="card bg-success">
            <div class="card-body">
                <div class="media align-items-center">
                    <span class="p-3 mr-3 feature-icon rounded">
                        <svg width="36" height="36" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M15.1811 22.0083C15.065 21.9063 14.7968 21.6695 14.7015 21.5799C12.3755 19.3941 10.8517 15.9712 10.8517 12.1138C10.8517 5.37813 15.4868 0.0410156 21.001 0.0410156C26.5152 0.0410156 31.1503 5.37813 31.1503 12.1138C31.1503 15.9679 29.6292 19.3884 27.3094 21.5778C27.2118 21.6699 26.9384 21.9116 26.8238 22.0125L26.8139 22.1799C26.8789 23.1847 27.554 24.0553 28.5232 24.3626C35.7277 26.641 40.9507 32.0853 41.8276 38.538C41.9483 39.3988 41.6902 40.2696 41.1198 40.9254C40.5495 41.5813 39.723 41.9579 38.8541 41.9579C32.4956 41.9591 9.50672 41.9591 3.14818 41.9591C2.2787 41.9591 1.4518 41.5824 0.881242 40.9263C0.31068 40.2701 0.0523763 39.3989 0.172318 38.5437C1.05145 32.0851 6.27444 26.641 13.4777 24.3628C14.4504 24.0544 15.1263 23.1802 15.1885 22.1722L15.1811 22.0083Z"
                                fill="white" />
                        </svg>

                    </span>
                    <div class="media-body text-right">
                        <p class="fs-18 text-white mb-2">Seluruh Data Karyawan </p>
                        <span class="fs-48 text-white font-w600"><?php echo $karyawan ; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-xxl-6 col-sm-6">
        <!-- <div class="card bg-secondary">
							<div class="card-body">
								<div class="media align-items-center">
									<span class="p-3 mr-3 feature-icon rounded">
										<svg width="36" height="36" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M40.614 9.36994C40.443 8.22658 39.8679 7.18234 38.9932 6.4265C38.1184 5.67067 37.0018 5.25328 35.8457 5.25H6.1543C4.99822 5.25328 3.88159 5.67067 3.00681 6.4265C2.13203 7.18234 1.55701 8.22658 1.38599 9.36994L21 22.0618L40.614 9.36994Z" fill="white"/>
											<path d="M21.7127 24.7274C21.5003 24.8647 21.2529 24.9378 21 24.9378C20.7471 24.9378 20.4997 24.8647 20.2873 24.7274L1.3125 12.4503V31.9081C1.31389 33.1918 1.82445 34.4225 2.73217 35.3302C3.63988 36.238 4.87061 36.7485 6.15431 36.7499H35.8457C37.1294 36.7485 38.3601 36.238 39.2678 35.3302C40.1755 34.4225 40.6861 33.1918 40.6875 31.9081V12.449L21.7127 24.7274Z" fill="white"/>
										</svg>
									</span>
									<div class="media-body text-right">
										<p class="fs-18 text-white mb-2">Unread Message</p>
										<span class="fs-48 text-white font-w600">93</span>
									</div>
								</div>
							</div>
						</div> -->
    </div>

    <!-- <div class="col-xl-3 col-xxl-4">
						<div class="row">
							<div class="col-xl-12">
								<div class="card d-flex flex-xl-column flex-sm-column flex-md-row flex-column">
									<div class="card-body text-center profile-bx">
										<div class="profile-image mb-4">
											<img src="../images/avatar/1.jpg" class="rounded-circle" alt="">
										</div>
										<h4 class="fs-22 text-black mb-1">Oda Dink</h4>
										<p class="mb-4">Programmer</p>
										<div class="row">
											<div class="col-4 p-0">
												<div class="d-inline-block mb-2 relative donut-chart-sale">
													<span class="donut" data-peity='{ "fill": ["rgb(255, 142, 38)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>7/9</span>
													<small class="text-black">66%</small>
												</div>
												<span class="d-block">PHP</span>
											</div>
											<div class="col-4 p-0">
												<div class="d-inline-block mb-2 relative donut-chart-sale">
													<span class="donut" data-peity='{ "fill": ["rgb(62, 168, 52)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>4/9</span>
													<small class="text-black">31%</small>
												</div>
												<span class="d-block">Vue</span>
											</div>
											<div class="col-4 p-0">
												<div class="d-inline-block mb-2 relative donut-chart-sale">
													<span class="donut" data-peity='{ "fill": ["rgb(34, 172, 147)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>2/9</span>
													<small class="text-black">7%</small>
												</div>
												<span class="d-block">Laravel</span>
											</div>
										</div>
									</div>
									<div class="card-body col-xl-12 col-md-6 col-sm-12 activity-card">
										<h4 class="fs-18 text-black mb-3">Recent Activities</h4>
										<div class="media mb-4">
											<span class="p-3 border mr-3 rounded">
												<svg class="primary-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M20.3955 10.8038C19.9733 10.8038 19.5767 10.8742 19.2057 11.0213V4.79104H12.9883C13.1226 4.42004 13.193 4.01066 13.193 3.58849C13.193 1.60554 11.5874 0 9.60447 0C7.62152 0 6.01598 1.60554 6.01598 3.58849C6.01598 4.01066 6.08634 4.41365 6.22067 4.79104H0.00958252V11.7441C0.642845 11.1684 1.48719 10.8102 2.4083 10.8102C4.39125 10.8102 5.99679 12.4158 5.99679 14.3987C5.99679 16.3817 4.39125 17.9872 2.4083 17.9872C1.48719 17.9872 0.642845 17.629 0.00958252 17.0533V24H19.2121V17.7697C19.5831 17.9104 19.9797 17.9872 20.4019 17.9872C22.3912 17.9872 23.9904 16.3817 23.9904 14.3987C23.9904 12.4158 22.3912 10.8038 20.3955 10.8038Z" fill="#40189D"/>
												</svg>
											</span>
											<div class="media-body">
												<p class="fs-14 mb-1 text-black font-w500">Your application has accepted in <strong>3 Vacancy</strong></p>
												<span class="fs-14">12h ago</span>
											</div>
										</div>
										<div class="media mb-4">
											<span class="p-3 border mr-3 rounded">
												<svg class="primary-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M20.3955 10.8038C19.9733 10.8038 19.5767 10.8742 19.2057 11.0213V4.79104H12.9883C13.1226 4.42004 13.193 4.01066 13.193 3.58849C13.193 1.60554 11.5874 0 9.60447 0C7.62152 0 6.01598 1.60554 6.01598 3.58849C6.01598 4.01066 6.08634 4.41365 6.22067 4.79104H0.00958252V11.7441C0.642845 11.1684 1.48719 10.8102 2.4083 10.8102C4.39125 10.8102 5.99679 12.4158 5.99679 14.3987C5.99679 16.3817 4.39125 17.9872 2.4083 17.9872C1.48719 17.9872 0.642845 17.629 0.00958252 17.0533V24H19.2121V17.7697C19.5831 17.9104 19.9797 17.9872 20.4019 17.9872C22.3912 17.9872 23.9904 16.3817 23.9904 14.3987C23.9904 12.4158 22.3912 10.8038 20.3955 10.8038Z" fill="#40189D"/>
												</svg>
											</span>
											<div class="media-body">
												<p class="fs-14 mb-1 text-black font-w500">Your application has accepted in <strong>3 Vacancy</strong></p>
												<span class="fs-14">12h ago</span>
											</div>
										</div>
										<div class="media mb-4">
											<span class="p-3 border mr-3 rounded">
												<svg class="primary-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M20.3955 10.8038C19.9733 10.8038 19.5767 10.8742 19.2057 11.0213V4.79104H12.9883C13.1226 4.42004 13.193 4.01066 13.193 3.58849C13.193 1.60554 11.5874 0 9.60447 0C7.62152 0 6.01598 1.60554 6.01598 3.58849C6.01598 4.01066 6.08634 4.41365 6.22067 4.79104H0.00958252V11.7441C0.642845 11.1684 1.48719 10.8102 2.4083 10.8102C4.39125 10.8102 5.99679 12.4158 5.99679 14.3987C5.99679 16.3817 4.39125 17.9872 2.4083 17.9872C1.48719 17.9872 0.642845 17.629 0.00958252 17.0533V24H19.2121V17.7697C19.5831 17.9104 19.9797 17.9872 20.4019 17.9872C22.3912 17.9872 23.9904 16.3817 23.9904 14.3987C23.9904 12.4158 22.3912 10.8038 20.3955 10.8038Z" fill="#40189D"/>
												</svg>
											</span>
											<div class="media-body">
												<p class="fs-14 mb-1 text-black font-w500">Your application has accepted in <strong>3 Vacancy</strong></p>
												<span class="fs-14">12h ago</span>
											</div>
										</div>
										<div class="media">
											<span class="p-3 border mr-3 rounded">
												<svg class="primary-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M20.3955 10.8038C19.9733 10.8038 19.5767 10.8742 19.2057 11.0213V4.79104H12.9883C13.1226 4.42004 13.193 4.01066 13.193 3.58849C13.193 1.60554 11.5874 0 9.60447 0C7.62152 0 6.01598 1.60554 6.01598 3.58849C6.01598 4.01066 6.08634 4.41365 6.22067 4.79104H0.00958252V11.7441C0.642845 11.1684 1.48719 10.8102 2.4083 10.8102C4.39125 10.8102 5.99679 12.4158 5.99679 14.3987C5.99679 16.3817 4.39125 17.9872 2.4083 17.9872C1.48719 17.9872 0.642845 17.629 0.00958252 17.0533V24H19.2121V17.7697C19.5831 17.9104 19.9797 17.9872 20.4019 17.9872C22.3912 17.9872 23.9904 16.3817 23.9904 14.3987C23.9904 12.4158 22.3912 10.8038 20.3955 10.8038Z" fill="#40189D"/>
												</svg>
											</span>
											<div class="media-body">
												<p class="fs-14 mb-1 text-black font-w500">Your application has accepted in <strong>3 Vacancy</strong></p>
												<span class="fs-14">12h ago</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-9 col-xxl-8">
						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header border-0 pb-0 flex-wrap">
										<h4 class="fs-20 text-black mr-4 mb-2">Vacancy Stats</h4>
										<div class="custom-control custom-switch toggle-switch text-right mr-3 mb-2">
											<input type="checkbox" class="custom-control-input" id="customSwitch1">
											<label class="custom-control-label" for="customSwitch1">Application Sent</label>
										</div>
										<div class="custom-control custom-switch toggle-switch text-right mr-3 mb-2">
											<input type="checkbox" class="custom-control-input" id="customSwitch2">
											<label class="custom-control-label" for="customSwitch2">Interviews</label>
										</div>
										<div class="custom-control custom-switch toggle-switch text-right mr-3 mb-2">
											<input type="checkbox" class="custom-control-input" id="customSwitch3">
											<label class="custom-control-label" for="customSwitch3">Rejected</label>
										</div>
										<select class="form-control default-select style-1">
											<option>This Month</option>
											<option>Next Month</option>
										</select>
									</div>
									<div class="card-body">	
										<canvas id="lineChart" class="Vacancy-chart"></canvas>
										<div class="d-flex flex-wrap align-items-center justify-content-center mt-3">
											<div class="fs-14 text-black mr-4">
												<svg class="mr-2" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect width="19" height="19" rx="9.5" fill="#4E36E2"/>
												</svg>
												Application Sent
											</div>
											<div class="fs-14 text-black mr-4">
												<svg class="mr-2" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect width="19" height="19" rx="9.5" fill="#1BD084"/>
												</svg>
												Interviews
											</div>
											<div class="fs-14 text-black">
												<svg class="mr-2" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect width="19" height="19" rx="9.5" fill="#FF424D"/>
												</svg>
												Rejected
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-12">
								<h4 class="fs-20 text-black mb-sm-4 mt-sm-0 mt-2  mb-2">Recomended Jobs</h4>
								<div class="testimonial-one owl-carousel">
									<div class="items">
										<div class="card shadow">
											<div class="card-body">	
												<div class="media mb-2">
													<div class="media-body">
														<p class="mb-1">Maximoz Team</p>
														<h4 class="fs-20 text-black">PHP Progammer</h4>
													</div>
													<svg class="ml-3" width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M0 8.72727C0 3.90733 3.90733 0 8.72727 0H51.2727C56.0927 0 60 3.90733 60 8.72727V51.2727C60 56.0927 56.0927 60 51.2727 60H8.72727C3.90733 60 0 56.0927 0 51.2727V8.72727Z" fill="#D3D3D3"/>
														<path d="M0 8.72727C0 3.90733 3.90733 0 8.72727 0H51.2727C56.0927 0 60 3.90733 60 8.72727V51.2727C60 56.0927 56.0927 60 51.2727 60H8.72727C3.90733 60 0 56.0927 0 51.2727V8.72727Z" fill="#3144F3"/>
														<path d="M15.4662 15.4665C17.3565 13.5761 19.6007 12.0766 22.0705 11.0536C24.5403 10.0305 27.1875 9.50399 29.8608 9.50399C32.5342 9.50399 35.1813 10.0305 37.6512 11.0536C40.121 12.0766 42.3652 13.5761 44.2555 15.4665C46.1459 17.3568 47.6453 19.6009 48.6684 22.0708C49.6914 24.5406 50.218 27.1878 50.218 29.8611C50.218 32.5345 49.6914 35.1816 48.6684 37.6515C47.6453 40.1213 46.1458 42.3655 44.2555 44.2558L37.0582 37.0585C38.0033 36.1133 38.7531 34.9912 39.2646 33.7563C39.7761 32.5214 40.0394 31.1978 40.0394 29.8611C40.0394 28.5245 39.7761 27.2009 39.2646 25.966C38.7531 24.731 38.0033 23.609 37.0582 22.6638C36.113 21.7186 34.9909 20.9689 33.756 20.4574C32.5211 19.9458 31.1975 19.6826 29.8608 19.6826C28.5242 19.6826 27.2006 19.9458 25.9657 20.4574C24.7307 20.9689 23.6087 21.7186 22.6635 22.6638L15.4662 15.4665Z" fill="#8FD7FF"/>
														<path d="M15.4661 44.2558C11.6484 40.4381 9.50365 35.2601 9.50365 29.8611C9.50365 24.462 11.6484 19.2841 15.4661 15.4664C19.2838 11.6487 24.4617 9.50395 29.8608 9.50395C35.2598 9.50394 40.4378 11.6487 44.2555 15.4664L37.0581 22.6637C35.1493 20.7549 32.5603 19.6825 29.8608 19.6825C27.1613 19.6825 24.5723 20.7549 22.6635 22.6638C20.7546 24.5726 19.6822 27.1616 19.6822 29.8611C19.6822 32.5606 20.7546 35.1496 22.6635 37.0584L15.4661 44.2558Z" fill="white"/>
													</svg>
												</div>
												<span class="text-primary font-w500 d-block mb-3">$14,000 - $25,000</span>
												<p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
												<div class="d-flex align-items-center mt-4">
													<a href="companies.html" class="btn btn-primary light btn-rounded mr-auto">REMOTE</a>
													<span class="text-black font-w500 pl-3">London, England</span>
												</div>
											</div>
										</div>
									</div>
									<div class="items">
										<div class="card shadow">
											<div class="card-body">	
												<div class="media mb-2">
													<div class="media-body">
														<p class="mb-1">Klean n Clin Studios</p>
														<h4 class="fs-20 text-black">Senior Programmer</h4>
													</div>
													<svg class="ml-3" width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M0 8.72727C0 3.90733 3.90733 0 8.72727 0H51.2727C56.0927 0 60 3.90733 60 8.72727V51.2727C60 56.0927 56.0927 60 51.2727 60H8.72727C3.90733 60 0 56.0927 0 51.2727V8.72727Z" fill="#D3D3D3"/>
														<path d="M0 8.72727C0 3.90733 3.90733 0 8.72727 0H51.2727C56.0927 0 60 3.90733 60 8.72727V51.2727C60 56.0927 56.0927 60 51.2727 60H8.72727C3.90733 60 0 56.0927 0 51.2727V8.72727Z" fill="#FE8024"/>
														<path d="M15.4662 15.4665C17.3565 13.5761 19.6007 12.0766 22.0705 11.0536C24.5403 10.0305 27.1875 9.50398 29.8608 9.50398C32.5342 9.50399 35.1813 10.0305 37.6512 11.0536C40.121 12.0766 42.3652 13.5761 44.2555 15.4665C46.1459 17.3568 47.6453 19.6009 48.6684 22.0708C49.6914 24.5406 50.218 27.1878 50.218 29.8611C50.218 32.5345 49.6914 35.1816 48.6684 37.6515C47.6453 40.1213 46.1458 42.3655 44.2555 44.2558L37.0582 37.0585C38.0033 36.1133 38.7531 34.9912 39.2646 33.7563C39.7761 32.5214 40.0394 31.1978 40.0394 29.8611C40.0394 28.5245 39.7761 27.2009 39.2646 25.966C38.7531 24.731 38.0033 23.609 37.0582 22.6638C36.113 21.7186 34.9909 20.9689 33.756 20.4574C32.5211 19.9458 31.1975 19.6826 29.8608 19.6826C28.5242 19.6826 27.2006 19.9458 25.9657 20.4574C24.7307 20.9689 23.6087 21.7186 22.6635 22.6638L15.4662 15.4665Z" fill="white"/>
														<path d="M15.4661 44.2558C11.6484 40.4381 9.50364 35.2601 9.50364 29.8611C9.50363 24.462 11.6484 19.2841 15.4661 15.4664C19.2838 11.6487 24.4617 9.50395 29.8608 9.50395C35.2598 9.50394 40.4377 11.6487 44.2554 15.4664L37.0581 22.6637C35.1493 20.7549 32.5603 19.6825 29.8608 19.6825C27.1613 19.6825 24.5723 20.7549 22.6634 22.6638C20.7546 24.5726 19.6822 27.1616 19.6822 29.8611C19.6822 32.5606 20.7546 35.1496 22.6634 37.0584L15.4661 44.2558Z" fill="white"/>
													</svg>
												</div>
												<span class="text-primary font-w500 d-block mb-3">$14,000 - $25,000</span>
												<p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
												<div class="d-flex align-items-center mt-4">
													<a href="companies.html" class="btn btn-primary light btn-rounded mr-auto">REMOTE</a>
													<span class="text-black font-w500 pl-3">Manchester, England</span>
												</div>
											</div>
										</div>
									</div>
									<div class="items">
										<div class="card shadow">
											<div class="card-body">	
												<div class="media mb-2">
													<div class="media-body">
														<p class="mb-1">Maximoz Team</p>
														<h4 class="fs-20 text-black">Intern UX Designer</h4>
													</div>
													<svg class="ml-3" width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M0 8.72727C0 3.90733 3.90733 0 8.72727 0H51.2727C56.0927 0 60 3.90733 60 8.72727V51.2727C60 56.0927 56.0927 60 51.2727 60H8.72727C3.90733 60 0 56.0927 0 51.2727V8.72727Z" fill="#D3D3D3"/>
														<path d="M0 8.72727C0 3.90733 3.90733 0 8.72727 0H51.2727C56.0927 0 60 3.90733 60 8.72727V51.2727C60 56.0927 56.0927 60 51.2727 60H8.72727C3.90733 60 0 56.0927 0 51.2727V8.72727Z" fill="#FE8024"/>
														<path d="M15.4662 15.4665C17.3565 13.5761 19.6007 12.0766 22.0705 11.0536C24.5403 10.0305 27.1875 9.50398 29.8608 9.50398C32.5342 9.50399 35.1813 10.0305 37.6512 11.0536C40.121 12.0766 42.3652 13.5761 44.2555 15.4665C46.1459 17.3568 47.6453 19.6009 48.6684 22.0708C49.6914 24.5406 50.218 27.1878 50.218 29.8611C50.218 32.5345 49.6914 35.1816 48.6684 37.6515C47.6453 40.1213 46.1458 42.3655 44.2555 44.2558L37.0582 37.0585C38.0033 36.1133 38.7531 34.9912 39.2646 33.7563C39.7761 32.5214 40.0394 31.1978 40.0394 29.8611C40.0394 28.5245 39.7761 27.2009 39.2646 25.966C38.7531 24.731 38.0033 23.609 37.0582 22.6638C36.113 21.7186 34.9909 20.9689 33.756 20.4574C32.5211 19.9458 31.1975 19.6826 29.8608 19.6826C28.5242 19.6826 27.2006 19.9458 25.9657 20.4574C24.7307 20.9689 23.6087 21.7186 22.6635 22.6638L15.4662 15.4665Z" fill="white"/>
														<path d="M15.4661 44.2558C11.6484 40.4381 9.50364 35.2601 9.50364 29.8611C9.50363 24.462 11.6484 19.2841 15.4661 15.4664C19.2838 11.6487 24.4617 9.50395 29.8608 9.50395C35.2598 9.50394 40.4377 11.6487 44.2554 15.4664L37.0581 22.6637C35.1493 20.7549 32.5603 19.6825 29.8608 19.6825C27.1613 19.6825 24.5723 20.7549 22.6634 22.6638C20.7546 24.5726 19.6822 27.1616 19.6822 29.8611C19.6822 32.5606 20.7546 35.1496 22.6634 37.0584L15.4661 44.2558Z" fill="white"/>
													</svg>
												</div>
												<span class="text-primary font-w500 d-block mb-3">$14,000 - $25,000</span>
												<p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
												<div class="d-flex align-items-center mt-4">
													<a href="companies.html" class="btn btn-primary light btn-rounded mr-auto">FULTIME</a>
													<span class="text-black font-w500 pl-3">London, England</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12">
						<div class="d-sm-flex align-items-center mb-3 mt-sm-0 mt-2">
							<h4 class="text-black fs-20 mr-auto">Featured Companies</h4>
							<a href="companies.html" class="btn btn-primary light btn-rounded">View More
								<svg class="ml-3" width="24" height="14" viewBox="0 0 24 14" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M23.5607 5.93941L18.2461 0.62482C17.9532 0.331898 17.5693 0.185461 17.1854 0.185461C16.8015 0.185461 16.4176 0.331898 16.1247 0.62482C15.539 1.21062 15.539 2.16035 16.1247 2.74615L18.8787 5.50005L1.5 5.50005C0.671578 5.50005 0 6.17163 0 7.00005C0 7.82848 0.671578 8.50005 1.5 8.50005L18.8787 8.50005L16.1247 11.254C15.539 11.8398 15.539 12.7895 16.1247 13.3753C16.7106 13.9611 17.6602 13.9611 18.2461 13.3753L23.5607 8.06069C24.1464 7.47495 24.1464 6.52516 23.5607 5.93941Z" fill="#40189D"/>
								</svg>
							</a>
						</div>
						<div class="testimonial-two owl-carousel">
							<div class="items">
								<div class="card">
									<div class="card-body">
										<div class="media">
											<svg class="mr-3" width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M0 11.6364C0 5.20978 5.20978 0 11.6364 0H68.3636C74.7902 0 80 5.20978 80 11.6364V68.3636C80 74.7902 74.7902 80 68.3636 80H11.6364C5.20978 80 0 74.7902 0 68.3636V11.6364Z" fill="#D3D3D3"/>
												<path d="M0 11.6364C0 5.20978 5.20978 0 11.6364 0H68.3636C74.7902 0 80 5.20978 80 11.6364V68.3636C80 74.7902 74.7902 80 68.3636 80H11.6364C5.20978 80 0 74.7902 0 68.3636V11.6364Z" fill="#40C7CF"/>
												<path d="M20.6216 20.6219C23.142 18.1015 26.1342 16.1022 29.4273 14.7381C32.7205 13.374 36.25 12.672 39.8145 12.672C43.3789 12.672 46.9085 13.374 50.2016 14.7381C53.4947 16.1022 56.4869 18.1015 59.0074 20.6219C61.5278 23.1424 63.5271 26.1346 64.8912 29.4277C66.2552 32.7208 66.9573 36.2504 66.9573 39.8148C66.9573 43.3793 66.2552 46.9088 64.8912 50.202C63.5271 53.4951 61.5278 56.4873 59.0074 59.0077L49.4109 49.4113C50.6711 48.1511 51.6708 46.6549 52.3528 45.0084C53.0348 43.3618 53.3859 41.5971 53.3859 39.8148C53.3859 38.0326 53.0348 36.2678 52.3528 34.6213C51.6708 32.9747 50.6711 31.4786 49.4109 30.2184C48.1507 28.9582 46.6546 27.9585 45.008 27.2765C43.3615 26.5944 41.5967 26.2434 39.8145 26.2434C38.0322 26.2434 36.2675 26.5944 34.6209 27.2765C32.9743 27.9585 31.4782 28.9582 30.218 30.2184L20.6216 20.6219Z" fill="#8FD7FF"/>
												<path d="M20.6215 59.0077C15.5312 53.9174 12.6715 47.0135 12.6715 39.8148C12.6715 32.6161 15.5312 25.7122 20.6215 20.6219C25.7118 15.5316 32.6157 12.6719 39.8144 12.6719C47.0131 12.6719 53.917 15.5316 59.0073 20.6219L49.4108 30.2183C46.8657 27.6732 43.4138 26.2434 39.8144 26.2434C36.215 26.2434 32.7631 27.6732 30.2179 30.2183C27.6728 32.7635 26.243 36.2154 26.243 39.8148C26.243 43.4141 27.6728 46.8661 30.2179 49.4112L20.6215 59.0077Z" fill="white"/>
											</svg>
											<div class="media-body">
												<h6 class="fs-16 text-black font-w600">Herman-Carter</h6>
												<span class="text-primary font-w500">21 Vacancy</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="items">
								<div class="card">
									<div class="card-body">
										<div class="media">
											<svg class="mr-3" width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M0 11.6364C0 5.20978 5.20978 0 11.6364 0H68.3636C74.7902 0 80 5.20978 80 11.6364V68.3636C80 74.7902 74.7902 80 68.3636 80H11.6364C5.20978 80 0 74.7902 0 68.3636V11.6364Z" fill="#D3D3D3"/>
												<path d="M0 11.6364C0 5.20978 5.20978 0 11.6364 0H68.3636C74.7902 0 80 5.20978 80 11.6364V68.3636C80 74.7902 74.7902 80 68.3636 80H11.6364C5.20978 80 0 74.7902 0 68.3636V11.6364Z" fill="#6EC061"/>
												<path d="M39.8144 66.9577C36.25 66.9577 32.7205 66.2556 29.4273 64.8916C26.1342 63.5275 23.142 61.5282 20.6216 59.0077C18.1011 56.4873 16.1018 53.4951 14.7377 50.2019C13.3737 46.9088 12.6716 43.3793 12.6716 39.8148C12.6716 36.2504 13.3737 32.7208 14.7377 29.4277C16.1018 26.1346 18.1011 23.1424 20.6216 20.6219C23.142 18.1015 26.1342 16.1021 29.4273 14.7381C32.7205 13.374 36.25 12.672 39.8145 12.672L39.8145 26.2434C38.0322 26.2434 36.2675 26.5944 34.6209 27.2765C32.9743 27.9585 31.4782 28.9582 30.218 30.2184C28.9578 31.4786 27.9581 32.9747 27.2761 34.6213C26.5941 36.2678 26.243 38.0326 26.243 39.8148C26.243 41.597 26.5941 43.3618 27.2761 45.0084C27.9581 46.6549 28.9578 48.151 30.218 49.4113C31.4782 50.6715 32.9743 51.6712 34.6209 52.3532C36.2675 53.0352 38.0322 53.3863 39.8144 53.3863L39.8144 66.9577Z" fill="white"/>
												<path d="M20.6215 59.0077C15.5312 53.9174 12.6715 47.0135 12.6715 39.8148C12.6715 32.6161 15.5312 25.7122 20.6215 20.6219C25.7118 15.5316 32.6157 12.6719 39.8144 12.6719C47.0131 12.6719 53.917 15.5316 59.0073 20.6219L49.4108 30.2183C46.8657 27.6732 43.4138 26.2434 39.8144 26.2434C36.215 26.2434 32.7631 27.6732 30.2179 30.2183C27.6728 32.7635 26.243 36.2154 26.243 39.8148C26.243 43.4141 27.6728 46.8661 30.2179 49.4112L20.6215 59.0077Z" fill="white"/>
											</svg>
											<div class="media-body">
												<h6 class="fs-16 text-black font-w600">Funk Inc.</h6>
												<span class="text-primary font-w500">21 Vacancy</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="items">
								<div class="card">
									<div class="card-body">
										<div class="media">
											<svg class="mr-3" width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M0 11.6364C0 5.20978 5.20978 0 11.6364 0H68.3636C74.7902 0 80 5.20978 80 11.6364V68.3636C80 74.7902 74.7902 80 68.3636 80H11.6364C5.20978 80 0 74.7902 0 68.3636V11.6364Z" fill="#D3D3D3"/>
												<path d="M0 11.6364C0 5.20978 5.20978 0 11.6364 0H68.3636C74.7902 0 80 5.20978 80 11.6364V68.3636C80 74.7902 74.7902 80 68.3636 80H11.6364C5.20978 80 0 74.7902 0 68.3636V11.6364Z" fill="#F3C831"/>
												<path d="M20.6216 20.6219C23.142 18.1015 26.1342 16.1022 29.4273 14.7381C32.7205 13.374 36.25 12.672 39.8145 12.672C43.3789 12.672 46.9085 13.374 50.2016 14.7381C53.4947 16.1022 56.4869 18.1015 59.0074 20.6219C61.5278 23.1424 63.5271 26.1346 64.8912 29.4277C66.2552 32.7208 66.9573 36.2504 66.9573 39.8148C66.9573 43.3793 66.2552 46.9088 64.8912 50.202C63.5271 53.4951 61.5278 56.4873 59.0074 59.0077L49.4109 49.4113C50.6711 48.1511 51.6708 46.6549 52.3528 45.0084C53.0348 43.3618 53.3859 41.5971 53.3859 39.8148C53.3859 38.0326 53.0348 36.2678 52.3528 34.6213C51.6708 32.9747 50.6711 31.4786 49.4109 30.2184C48.1507 28.9582 46.6546 27.9585 45.008 27.2765C43.3615 26.5944 41.5967 26.2434 39.8145 26.2434C38.0322 26.2434 36.2675 26.5944 34.6209 27.2765C32.9743 27.9585 31.4782 28.9582 30.218 30.2184L20.6216 20.6219Z" fill="white"/>
												<path d="M20.6215 59.0077C15.5312 53.9174 12.6715 47.0135 12.6715 39.8148C12.6715 32.6161 15.5312 25.7122 20.6215 20.6219C25.7118 15.5316 32.6157 12.6719 39.8144 12.6719C47.0131 12.6719 53.917 15.5316 59.0073 20.6219L49.4108 30.2183C46.8657 27.6732 43.4138 26.2434 39.8144 26.2434C36.215 26.2434 32.7631 27.6732 30.2179 30.2183C27.6728 32.7635 26.243 36.2154 26.243 39.8148C26.243 43.4141 27.6728 46.8661 30.2179 49.4112L20.6215 59.0077Z" fill="white"/>
											</svg>
											<div class="media-body">
												<h6 class="fs-16 text-black font-w600">Williamson Inc</h6>
												<span class="text-primary font-w500">21 Vacancy</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="items">
								<div class="card">
									<div class="card-body">
										<div class="media">
											<svg class="mr-3" width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M0 11.6364C0 5.20978 5.20978 0 11.6364 0H68.3636C74.7902 0 80 5.20978 80 11.6364V68.3636C80 74.7902 74.7902 80 68.3636 80H11.6364C5.20978 80 0 74.7902 0 68.3636V11.6364Z" fill="#D3D3D3"/>
												<path d="M0 11.6364C0 5.20978 5.20978 0 11.6364 0H68.3636C74.7902 0 80 5.20978 80 11.6364V68.3636C80 74.7902 74.7902 80 68.3636 80H11.6364C5.20978 80 0 74.7902 0 68.3636V11.6364Z" fill="#F331E0"/>
												<path d="M20.6216 20.6219C23.142 18.1015 26.1342 16.1022 29.4273 14.7381C32.7205 13.374 36.25 12.672 39.8145 12.672C43.3789 12.672 46.9085 13.374 50.2016 14.7381C53.4947 16.1022 56.4869 18.1015 59.0074 20.6219C61.5278 23.1424 63.5271 26.1346 64.8912 29.4277C66.2552 32.7208 66.9573 36.2504 66.9573 39.8148C66.9573 43.3793 66.2552 46.9088 64.8912 50.202C63.5271 53.4951 61.5278 56.4873 59.0074 59.0077L49.4109 49.4113C50.6711 48.1511 51.6708 46.6549 52.3528 45.0084C53.0348 43.3618 53.3859 41.5971 53.3859 39.8148C53.3859 38.0326 53.0348 36.2678 52.3528 34.6213C51.6708 32.9747 50.6711 31.4786 49.4109 30.2184C48.1507 28.9582 46.6546 27.9585 45.008 27.2765C43.3615 26.5944 41.5967 26.2434 39.8145 26.2434C38.0322 26.2434 36.2675 26.5944 34.6209 27.2765C32.9743 27.9585 31.4782 28.9582 30.218 30.2184L20.6216 20.6219Z" fill="#F331E0"/>
												<path d="M20.6215 59.0077C15.5312 53.9174 12.6715 47.0135 12.6715 39.8148C12.6715 32.6161 15.5312 25.7122 20.6215 20.6219C25.7118 15.5316 32.6157 12.6719 39.8144 12.6719C47.0131 12.6719 53.917 15.5316 59.0073 20.6219L49.4108 30.2183C46.8657 27.6732 43.4138 26.2434 39.8144 26.2434C36.215 26.2434 32.7631 27.6732 30.2179 30.2183C27.6728 32.7635 26.243 36.2154 26.243 39.8148C26.243 43.4141 27.6728 46.8661 30.2179 49.4112L20.6215 59.0077Z" fill="#B60DA5"/>
											</svg>
											<div class="media-body">
												<h6 class="fs-16 text-black font-w600">Donnelly Ltd.</h6>
												<span class="text-primary font-w500">21 Vacancy</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="items">
								<div class="card">
									<div class="card-body">
										<div class="media">
											<svg class="mr-3" width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M0 11.6364C0 5.20978 5.20978 0 11.6364 0H68.3636C74.7902 0 80 5.20978 80 11.6364V68.3636C80 74.7902 74.7902 80 68.3636 80H11.6364C5.20978 80 0 74.7902 0 68.3636V11.6364Z" fill="#D3D3D3"/>
												<path d="M0 11.6364C0 5.20978 5.20978 0 11.6364 0H68.3636C74.7902 0 80 5.20978 80 11.6364V68.3636C80 74.7902 74.7902 80 68.3636 80H11.6364C5.20978 80 0 74.7902 0 68.3636V11.6364Z" fill="#9B70A1"/>
												<path d="M20.6216 20.6219C23.142 18.1015 26.1342 16.1022 29.4273 14.7381C32.7205 13.374 36.25 12.672 39.8145 12.672C43.3789 12.672 46.9085 13.374 50.2016 14.7381C53.4947 16.1022 56.4869 18.1015 59.0074 20.6219C61.5278 23.1424 63.5271 26.1346 64.8912 29.4277C66.2552 32.7208 66.9573 36.2504 66.9573 39.8148C66.9573 43.3793 66.2552 46.9088 64.8912 50.202C63.5271 53.4951 61.5278 56.4873 59.0074 59.0077L49.4109 49.4113C50.6711 48.1511 51.6708 46.6549 52.3528 45.0084C53.0348 43.3618 53.3859 41.5971 53.3859 39.8148C53.3859 38.0326 53.0348 36.2678 52.3528 34.6213C51.6708 32.9747 50.6711 31.4786 49.4109 30.2184C48.1507 28.9582 46.6546 27.9585 45.008 27.2765C43.3615 26.5944 41.5967 26.2434 39.8145 26.2434C38.0322 26.2434 36.2675 26.5944 34.6209 27.2765C32.9743 27.9585 31.4782 28.9582 30.218 30.2184L20.6216 20.6219Z" fill="white"/>
												<path d="M20.6215 59.0077C15.5312 53.9174 12.6715 47.0135 12.6715 39.8148C12.6715 32.6161 15.5312 25.7122 20.6215 20.6219C25.7118 15.5316 32.6157 12.6719 39.8144 12.6719C47.0131 12.6719 53.917 15.5316 59.0073 20.6219L49.4108 30.2183C46.8657 27.6732 43.4138 26.2434 39.8144 26.2434C36.215 26.2434 32.7631 27.6732 30.2179 30.2183C27.6728 32.7635 26.243 36.2154 26.243 39.8148C26.243 43.4141 27.6728 46.8661 30.2179 49.4112L20.6215 59.0077Z" fill="white"/>
											</svg>
											<div class="media-body">
												<h6 class="fs-16 text-black font-w600">Herman-Carter</h6>
												<span class="text-primary font-w500">21 Vacancy</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				 -->
    <div class="col-xl-12">
        <h4 class="fs-20 text-black mb-sm-4 mt-sm-0 mt-2  mb-2">Posisi Yang Kamu (<?= $nama_alternatif2?>) Pilih Yaitu (<?= $ket_posisi2?>)</h4>
		<h4 class="fs-20 text-black mb-sm-4 mt-sm-0 mt-2  mb-2">Berikut Syarat Yang Harus di penuhi:</h4>

        <div class="testimonial-one owl-carousel">
		<?php
            $rows = $db->get_results("SELECT * FROM tb_syarat where nama_posisi='$ket_posisi2'");
            
            foreach($rows as $row):?>
            <div class="items">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="media mb-2">
                            <div class="media-body">
                                <p class="mb-1"><?=$nama_alternatif2?></p>
                                <h4 class="fs-20 text-black"><?=$row->nama_posisi?></h4>
                            </div>
                            <svg class="ml-3" width="60" height="60" viewBox="0 0 60 60" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0 8.72727C0 3.90733 3.90733 0 8.72727 0H51.2727C56.0927 0 60 3.90733 60 8.72727V51.2727C60 56.0927 56.0927 60 51.2727 60H8.72727C3.90733 60 0 56.0927 0 51.2727V8.72727Z"
                                    fill="#D3D3D3" />
                                <path
                                    d="M0 8.72727C0 3.90733 3.90733 0 8.72727 0H51.2727C56.0927 0 60 3.90733 60 8.72727V51.2727C60 56.0927 56.0927 60 51.2727 60H8.72727C3.90733 60 0 56.0927 0 51.2727V8.72727Z"
                                    fill="#3144F3" />
                                <path
                                    d="M15.4662 15.4665C17.3565 13.5761 19.6007 12.0766 22.0705 11.0536C24.5403 10.0305 27.1875 9.50399 29.8608 9.50399C32.5342 9.50399 35.1813 10.0305 37.6512 11.0536C40.121 12.0766 42.3652 13.5761 44.2555 15.4665C46.1459 17.3568 47.6453 19.6009 48.6684 22.0708C49.6914 24.5406 50.218 27.1878 50.218 29.8611C50.218 32.5345 49.6914 35.1816 48.6684 37.6515C47.6453 40.1213 46.1458 42.3655 44.2555 44.2558L37.0582 37.0585C38.0033 36.1133 38.7531 34.9912 39.2646 33.7563C39.7761 32.5214 40.0394 31.1978 40.0394 29.8611C40.0394 28.5245 39.7761 27.2009 39.2646 25.966C38.7531 24.731 38.0033 23.609 37.0582 22.6638C36.113 21.7186 34.9909 20.9689 33.756 20.4574C32.5211 19.9458 31.1975 19.6826 29.8608 19.6826C28.5242 19.6826 27.2006 19.9458 25.9657 20.4574C24.7307 20.9689 23.6087 21.7186 22.6635 22.6638L15.4662 15.4665Z"
                                    fill="#8FD7FF" />
                                <path
                                    d="M15.4661 44.2558C11.6484 40.4381 9.50365 35.2601 9.50365 29.8611C9.50365 24.462 11.6484 19.2841 15.4661 15.4664C19.2838 11.6487 24.4617 9.50395 29.8608 9.50395C35.2598 9.50394 40.4378 11.6487 44.2555 15.4664L37.0581 22.6637C35.1493 20.7549 32.5603 19.6825 29.8608 19.6825C27.1613 19.6825 24.5723 20.7549 22.6635 22.6638C20.7546 24.5726 19.6822 27.1616 19.6822 29.8611C19.6822 32.5606 20.7546 35.1496 22.6635 37.0584L15.4661 44.2558Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <span class="text-primary font-w500 d-block mb-3">Rp.<?=number_format($row->gaji)?></span>
                        <p class="fs-14"><?=$row->Keterangan?></p>
                        <!-- <div class="d-flex align-items-center mt-4">
                            <a href="companies.html" class="btn btn-primary light btn-rounded mr-auto">REMOTE</a>
                            <span class="text-black font-w500 pl-3">London, England</span>
                        </div> -->
                    </div>
                </div>
            </div>
			<?php endforeach?>
		</div>
    </div>
</div>
</div>