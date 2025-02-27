<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Requester - Auditee Feedback Survey Form</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/img/favicon.png'); ?>" type="image/x-icon">

    <!-- Bootstrap -->
    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('assets/css/font-awesome.css'); ?>" rel="stylesheet">
    <!-- Custom Style -->
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700" rel="stylesheet" type="text/css">
</head>

<body>

    <!-- Scroll to Top Button -->
    <a class="scrollToTop" href="#">
        <i class="fa fa-angle-up"></i>
    </a>

    <!-- Navigation Menu -->
    <section id="mu-menu">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= site_url('audit_calendar/requester'); ?>">
                        <img src="<?= base_url('assets/img/logo.png'); ?>" alt="logo">
                    </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
                        <li><a href="<?= site_url('audit_calendar/requester'); ?>">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tools<span class="fa fa-angle-down"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?= site_url('requester_afsform'); ?>">Auditee Feedback Survey Form</a></li>
                                <li><a href="<?= site_url('requester_dcrform'); ?>">Document Change Request Form</a></li>
                                <li><a href="<?= site_url('requester_dcrlist'); ?>">Document Change Request List</a></li>
                                <li><a href="<?= site_url('requester_emanuals'); ?>">E-Manuals</a></li>
                            </ul>
                        </li>
                        <li><a href="<?= site_url('profile_settings/requester'); ?>">Profile Settings</a></li>
                        <li><a href="<?= site_url('logout'); ?>">Logout</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
    </section>
    <!-- End Navigation Menu -->

    <div class="container">
        <br><br>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3 class="text-center" style="color:black">Auditee Feedback Survey</h3>
                <br><br>
                <p align="justify" style="color:black; line-height:2.0;">
                    <strong>DIRECTIONS:</strong> This survey is intended to elicit feedback to continuously improve the audit services of the office. The result of this evaluation will be handled with confidentiality and will be used to review and assess our auditing practices. Please answer the questions objectively. For all <strong>NO</strong> answer/s, kindly fill-out the <strong>REMARKS</strong> column to specify your concern.
                </p>
                <br><br>

                <?= form_open('requester/auditee_afsform/submit', ['class' => 'form-horizontal']); ?>

                <!-- Auditor Dropdown -->
                <div class="form-group">
                    <label for="Name_Of_Auditor" style="color:black;">Name of Auditor:</label>
                    <select name="Name_Of_Auditor" class="form-control" required>
                        <option value="" selected disabled>---Select Auditor---</option>
                        <?php foreach ($auditors as $auditor): ?>
                            <option value="<?= $auditor['Name_Of_Auditor']; ?>"><?= $auditor['Name_Of_Auditor']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Auditee Name -->
                <div class="form-group">
                    <label for="Name_Of_Auditee" style="color:black;">Name of Auditee:</label>
                    <input type="text" name="Name_Of_Auditee" class="form-control" required maxlength="100">
                </div>

                <!-- Date Accomplished -->
                <div class="form-group">
                    <label for="Date_Accomplished" style="color:black;">Date Accomplished:</label>
                    <input type="text" name="Date_Accomplished" class="form-control" value="<?= date('m/d/Y'); ?>" readonly required>
                </div>

                <!-- Department Dropdown -->
                <div class="form-group">
                    <label for="Department" style="color:black;">Department:</label>
                    <select name="Department" id="department-list" class="form-control" onChange="getOffices(this.value);" required>
                        <option value="" selected disabled>---Select Department---</option>
                        <?php foreach ($departments as $department): ?>
                            <option value="<?= $department['Department_Name']; ?>"><?= $department['Department_Name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Office Dropdown -->
                <div class="form-group">
                    <label for="Office" style="color:black;">Office:</label>
                    <select name="Office" id="office-list" class="form-control" required>
                        <option value="" selected disabled>---Select Office---</option>
                        <?php foreach ($offices as $office): ?>
                            <option value="<?= $office['Office_Name']; ?>"><?= $office['Office_Name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <br><br>

                <!-- Survey Questions -->
                <h4 class="text-center" style="color:black;">I. Auditor's Conduct and Decorum</h4>
                <br><br>
                <?php
                    $questions = [
                        "The auditor maintained a positive attitude.",
                        "The auditor dressed appropriately during the audit.",
                        "The auditor exhibited courtesy and professionalism.",
                        "The auditor demonstrated the ability to empathize with the auditee.",
                        "The auditor listened attentively to the auditee's concerns."
                    ];
                    for ($i = 1; $i <= 5; $i++):
                ?>
                    <div class="form-group">
                        <label for="Question_<?= $i; ?>A" style="color:black;"><?= $i . ". " . $questions[$i - 1]; ?></label>
                        <div>
                            <label class="radio-inline">
                                <input type="radio" name="Question_<?= $i; ?>A" value="YES" checked> YES
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="Question_<?= $i; ?>A" value="NO"> NO
                            </label>
                            <input type="text" name="Remarks_<?= $i; ?>A" class="form-control" placeholder="Remarks" maxlength="100">
                        </div>
                    </div>
                <?php endfor; ?>

                <br><br>
                <div class="container mt-5">
                    <div class="text-center">
                        <h3 class="text-dark">II. Competence</h3>
                    </div>
                    <br><br>

                    <!-- Question 1 -->
                    <div class="form-group">
                        <p class="text-dark">1. The auditor showed evidence of preparation.</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Question_1B" value="YES" checked>
                            <label class="form-check-label">YES</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Question_1B" value="NO">
                            <label class="form-check-label">NO</label>
                        </div>
                        <input type="text" class="form-control mt-2" name="Remarks_1B" placeholder="Remarks" maxlength="100">
                    </div>
                    <br>

                    <!-- Question 2 -->
                    <div class="form-group">
                        <p class="text-dark">2. The auditor demonstrated good communication skills.</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Question_2B" value="YES" checked>
                            <label class="form-check-label">YES</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Question_2B" value="NO">
                            <label class="form-check-label">NO</label>
                        </div>
                        <input type="text" class="form-control mt-2" name="Remarks_2B" placeholder="Remarks" maxlength="100">
                    </div>
                    <br>

                    <!-- Question 3 -->
                    <div class="form-group">
                        <p class="text-dark">3. The auditor provided the auditee an opportunity to ask questions.</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Question_3B" value="YES" checked>
                            <label class="form-check-label">YES</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Question_3B" value="NO">
                            <label class="form-check-label">NO</label>
                        </div>
                        <input type="text" class="form-control mt-2" name="Remarks_3B" placeholder="Remarks" maxlength="100">
                    </div>
                    <br>

                    <!-- Question 4 -->
                    <div class="form-group">
                        <p class="text-dark">4. The auditor demonstrated high level of objectivity and integrity.</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Question_4B" value="YES" checked>
                            <label class="form-check-label">YES</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Question_4B" value="NO">
                            <label class="form-check-label">NO</label>
                        </div>
                        <input type="text" class="form-control mt-2" name="Remarks_4B" placeholder="Remarks" maxlength="100">
                    </div>
                    <br>

                    <!-- Question 5 -->
                    <div class="form-group">
                        <p class="text-dark">5. The auditor demonstrated knowledge of the policies and procedures being audited.</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Question_5B" value="YES" checked>
                            <label class="form-check-label">YES</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Question_5B" value="NO">
                            <label class="form-check-label">NO</label>
                        </div>
                        <input type="text" class="form-control mt-2" name="Remarks_5B" placeholder="Remarks" maxlength="100">
                    </div>
                    <br><br>
                </div>

                <!-- Section III: Auditing Process -->
                <div class="text-center">
                    <h3 style="color:black;">III. Auditing Process</h3>
                </div>
                <br/><br/>

                <!-- Question 1 -->
                <p style="color:black;">1. A notice was given prior to the schedule of audit.</p>
                <div class="form-group">
                    <label class="radio-inline">
                        <input type="radio" name="Question_1C" value="YES" checked> YES
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="Question_1C" value="NO"> NO
                    </label>
                    <input type="text" name="Remarks_1C" class="form-control" placeholder="Remarks" maxlength="100">
                </div>
                <br/><br/>

                <!-- Question 2 -->
                <p style="color:black;">2. The audit was conducted on the agreed schedule.</p>
                <div class="form-group">
                    <label class="radio-inline">
                        <input type="radio" name="Question_2C" value="YES" checked> YES
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="Question_2C" value="NO"> NO
                    </label>
                    <input type="text" name="Remarks_2C" class="form-control" placeholder="Remarks" maxlength="100">
                </div>
                <br/><br/>

                <!-- Question 3 -->
                <p style="color:black;">3. The purpose and scope of audit were clearly communicated.</p>
                <div class="form-group">
                    <label class="radio-inline">
                        <input type="radio" name="Question_3C" value="YES" checked> YES
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="Question_3C" value="NO"> NO
                    </label>
                    <input type="text" name="Remarks_3C" class="form-control" placeholder="Remarks" maxlength="100">
                </div>
                <br/><br/>

                <!-- Question 4 -->
                <p style="color:black;">4. The audit was conducted systematically.</p>
                <div class="form-group">
                    <label class="radio-inline">
                        <input type="radio" name="Question_4C" value="YES" checked> YES
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="Question_4C" value="NO"> NO
                    </label>
                    <input type="text" name="Remarks_4C" class="form-control" placeholder="Remarks" maxlength="100">
                </div>
                <br/><br/>

                <!-- Question 5 -->
                <p style="color:black;">5. A timely and constructive wrap-up meeting was conducted and it provided enough opportunity to clarify the audit findings.</p>
                <div class="form-group">
                    <label class="radio-inline">
                        <input type="radio" name="Question_5C" value="YES" checked> YES
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="Question_5C" value="NO"> NO
                    </label>
                    <input type="text" name="Remarks_5C" class="form-control" placeholder="Remarks" maxlength="100">
                </div>
                <br/><br/><br/><br/><br/>

                <!-- Section IV: General Feedback -->
                <div class="text-center">
                    <h3 style="color:black;">IV. General Feedback</h3>
                </div>
                <br/><br/>

                <!-- Question 1 -->
                <p style="color:black;">1. The recommendations are relevant and useful to address key issues on the existing policies and procedures.</p>
                <div class="form-group">
                    <label class="radio-inline">
                        <input type="radio" name="Question_1D" value="YES" checked> YES
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="Question_1D" value="NO"> NO
                    </label>
                    <input type="text" name="Remarks_1D" class="form-control" placeholder="Remarks" maxlength="100">
                </div>
                <br/><br/>

                <!-- Question 2 -->
                <p style="color:black;">2. The entire audit process has provided clarity in terms of carrying out the duties and responsibilities at work.</p>
                <div class="form-group">
                    <label class="radio-inline">
                        <input type="radio" name="Question_2D" value="YES" checked> YES
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="Question_2D" value="NO"> NO
                    </label>
                    <input type="text" name="Remarks_2D" class="form-control" placeholder="Remarks" maxlength="100">
                </div>
                <br/><br/>

                <!-- Question 3 -->
                <p style="color:black;">3. The audit was helpful in identifying areas of improvement of the current system.</p>
                <div class="form-group">
                    <label class="radio-inline">
                        <input type="radio" name="Question_3D" value="YES" checked> YES
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="Question_3D" value="NO"> NO
                    </label>
                    <input type="text" name="Remarks_3D" class="form-control" placeholder="Remarks" maxlength="100">
                </div>
                <br/><br/>

                <!-- Question 4 -->
                <p style="color:black;">4. Audit results were fairly and accurately reported using an objective perspective.</p>
                <div class="form-group">
                    <label class="radio-inline">
                        <input type="radio" name="Question_4D" value="YES" checked> YES
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="Question_4D" value="NO"> NO
                    </label>
                    <input type="text" name="Remarks_4D" class="form-control" placeholder="Remarks" maxlength="100">
                </div>
                <br/><br/>

                <!-- Question 5 -->
                <p style="color:black;">5. The audit added value and provided meaningful results.</p>
                <div class="form-group">
                    <label class="radio-inline">
                        <input type="radio" name="Question_5D" value="YES" checked> YES
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="Question_5D" value="NO"> NO
                    </label>
                    <input type="text" name="Remarks_5D" class="form-control" placeholder="Remarks" maxlength="100">
                </div>
                <br/><br/><br/><br/><br/>

                <div class="container mt-5">
                    <div class="text-center">
                        <h3 class="text-dark">V. Please write down your comments or suggestions to improve the auditing services of the office:</h3>
                    </div>
                    <div class="form-group mt-4">
                        <textarea class="form-control" name="Comments_Suggestions" rows="7" placeholder="Your comments or suggestions..." maxlength="500" required></textarea>
                    </div>

                    <!-- User ID Hidden -->
                    <!-- <input type="hidden" name="User_ID" value="<?= $fetch['user_id']; ?>" /> -->
                </div>

                <!-- Additional sections for other parts of the survey -->

                <div class="form-group text-center">
                    <p style="color:black;">Thank you for taking the time to accomplish this Auditee Feedback Survey.</p>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

                <?= form_close(); ?>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <!-- Custom Script -->
    <script src="<?= base_url('assets/js/custom.js'); ?>"></script>
</body>
</html>
