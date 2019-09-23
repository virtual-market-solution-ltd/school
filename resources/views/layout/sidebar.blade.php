            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="">
                        <a href="/dashboard" class="logo"><img src="/assets/images/icon_amar_school.png" height="35" alt="logo"></a>
                        &nbsp;
                        <a href="/dashboard" class="logo text-center">Amar School</a>

                    </div>
                </div>

                <div class="sidebar-inner slimscrollleft">
                    <div id="sidebar-menu">
                        <ul>
                            <li class="menu-title">Main</li>
                            <li><a href="/dashboard" class="waves-effect"><i class="mdi  mdi-view-dashboard"></i><span>Dashboard</span></a></li>
                                    
                            <li class="menu-title">Academic</li>
                                <li><a href="/events" class="waves-effect"><i class="mdi  mdi-calendar"></i><span>Events</span></a></li>
                                    
                                <li class="has_sub">
                                    <a href="" class="waves-effect">
                                        <i class="mdi mdi-package-variant"></i>
                                        <span> Attendance
                                            <span class="pull-right">
                                                <i class="mdi mdi-chevron-right"></i>
                                            </span>
                                        </span>
                                    </a>
                                    <ul class="list-unstyled">
                                        @if(Auth::user()->roles_id == 2)
                                        <!--<li><a href="/attendancerelation">Attendance Relation</a></li>-->
                                        @endif
                                        @if(Auth::user()->roles_id == 3)
                                        <li><a href="/attendance">Take Attendance </a></li>
                                        @endif
                                        <li><a href="/attendancereport">Attendance Report </a></li>
                                    </ul>
                                </li>


                                <li class="has_sub">
                                    <a href="" class="waves-effect">
                                        <i class="mdi mdi-package-variant"></i>
                                        <span> Homework
                                            <span class="pull-right">
                                                <i class="mdi mdi-chevron-right"></i>
                                            </span>
                                        </span>
                                    </a>
                                    <ul class="list-unstyled">
                                        @if(Auth::user()->roles_id == 2)
                                       <!--<li><a href="/attendancerelation">Attendance Relation</a></li>-->
                                        @endif
                                        @if(Auth::user()->roles_id == 3)
                                        <li><a href="/homework/create">Add Homework </a></li>
                                        @endif
                                        <li><a href="/homework">View Homework</a></li>
                                    </ul>
                                </li>

                                <li class="has_sub">
                                    <a href="" class="waves-effect">
                                        <i class="mdi mdi-package-variant"></i>
                                        <span> Classwork
                                            <span class="pull-right">
                                                <i class="mdi mdi-chevron-right"></i>
                                            </span>
                                        </span>
                                    </a>
                                    <ul class="list-unstyled">
                                        @if(Auth::user()->roles_id == 2)
                                        <!--<li><a href="/attendancerelation">Attendance Relation</a></li>-->
                                        @endif
                                        @if(Auth::user()->roles_id == 3)
                                        <li><a href="/homework/create">Add Classwork </a></li>
                                        @endif
                                        <li><a href="/homework">View Classwork</a></li>
                                    </ul>
                                </li>

                                <li class="has_sub">
                                    <a href="" class="waves-effect">
                                        <i class="mdi mdi-package-variant"></i>
                                        <span> Transport
                                            <span class="pull-right">
                                                <i class="mdi mdi-chevron-right"></i>
                                            </span>
                                        </span>
                                    </a>
                                    <ul class="list-unstyled">
                                        @if(Auth::user()->roles_id == 2)
                                        <!--<li><a href="/attendancerelation">Attendance Relation</a></li>-->
                                        @endif
                                        @if(Auth::user()->roles_id == 2)
                                        <li><a href="/transport/create">Add Transport</a></li>
                                        @endif
                                        <li><a href="/transport">View Transport</a></li>
                                    </ul>
                                </li>

                                <li class="has_sub">
                                    <a href="" class="waves-effect">
                                        <i class="mdi mdi-package-variant"></i>
                                        <span> Exam Routine
                                            <span class="pull-right">
                                                <i class="mdi mdi-chevron-right"></i>
                                            </span>
                                        </span>
                                    </a>
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="/examroutine" class="waves-effect">
                                                <i class="mdi  mdi-calendar"></i>
                                                <span>Exam Routine</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>


                                (@if(Auth::user()->roles_id == 2))
                                <li class="has_sub">
                                    <a href="" class="waves-effect">
                                        <i class="mdi mdi-settings"></i>
                                        <span> Settings
                                            <span class="pull-right">
                                                <i class="mdi mdi-chevron-right"></i>
                                            </span>
                                        </span>
                                    </a>
                                    <ul class="list-unstyled">
                                        @if(Auth::user()->roles_id == 2)
                                            <li><a href="/class">Class</a></li>
                                            <li><a href="/section">Section</a></li>
                                            <li><a href="/subject">Subject</a></li>
                                            <li><a href="/holiday">Holiday</a></li>
                                        @endif
                                    </ul>
                                </li>

                                <li class="menu-title">Administrative</li>

                                <li class="has_sub">
                                    <a href="" class="waves-effect">
                                        <i class="mdi mdi-package-variant"></i>
                                        <span> Dimension
                                            <span class="pull-right">
                                                <i class="mdi mdi-chevron-right"></i>
                                            </span>
                                        </span>
                                    </a>
                                    <ul class="list-unstyled">
                                        <li><a href="/dimensionentry">Dimension Entry</a></li>
                                    </ul>
                                </li>

                                <li class="has_sub">
                                    <a href="" class="waves-effect">
                                        <i class="mdi mdi-package-variant"></i>
                                        <span> Accounting
                                            <span class="pull-right">
                                                <i class="mdi mdi-chevron-right"></i>
                                            </span>
                                        </span>
                                    </a>
                                    <ul class="list-unstyled">
                                        <li><a href="{{ route('accounts.accounts_payments_view') }}">Payments</a></li>
                                        <li><a href="{{ route('accounts.accounts_deposit_view') }}">Deposits</a></li>
                                        <li><a href="{{ route('accounts.bank_account_transfer_view') }}">Bank Account Transfers</a></li>
                                        <li><a href="{{ route('accounts.journal_entry_view') }}">Journal Entry</a></li>
                                        <li><a href="">Budget Entry</a></li>
                                        <li><a href="">Reconcile Bank Account</a></li>
                                        <li><a href="">Revenue / Costs Accruals</a></li>
                                        <li><a href="">Journal Inquiry</a></li>
                                        <li><a href="">GL Inquiry</a></li>
                                        <li><a href="">Bank Account Inquiry</a></li>
                                        <li><a href="">Tax Inquiry</a></li>
                                        <li><a href="">Trial Balance</a></li>
                                        <li><a href="">Balance Sheet Drilldown</a></li>
                                        <li><a href="">Profit and Loss Drilldown</a></li>
                                        <li><a href="">Banking Reports</a></li>
                                        <li><a href="">General Ledger Reports</a></li>
                                        <li><a href="/bank_accounts_view">Bank Accounts</a></li>
                                        <li><a href="">Quick Entries</a></li>
                                        <li><a href="">Account Tags</a></li>
                                        <li><a href="">Currencies</a></li>
                                        <li><a href="">Exchange Rates</a></li>
                                        <li><a href="/gl_accounts_view">GL Accounts</a></li>
                                        <li><a href="/gl_account_groups_view">GL Account Groups</a></li>
                                        <li><a href="/gl_account_classes_view">GL Account Classes</a></li>
                                        <li><a href="">Revaluation of Currency Accounts</a></li>
                                    </ul>
                                </li>
                                <li class="has_sub">
                                    <a href="" class="waves-effect">
                                        <i class="mdi mdi-settings"></i>
                                        <span> Inventory
                                            <span class="pull-right">
                                                <i class="mdi mdi-chevron-right"></i>
                                            </span>
                                        </span>
                                    </a>
                                    <ul class="list-unstyled">
                                        <li><a href="/inventorylocationtransfer">Inventory Location Transfer</a></li>
                                        <li><a href="/inventoryadjustment">Inventory Adjustment</a></li>
                                        <li><a href="">Inventory Item Movements</a></li>
                                        <li><a href="">Inventory Item Status</a></li>
                                        <li><a href="">Inventory Reports</a></li>
                                        <li><a href="{{ route('inventory.add_items') }}">Items</a></li>
                                        <li><a href="">Foreign Item Codes</a></li>
                                        <li><a href="">Sales Kits</a></li>
                                        <li><a href="">Item Categories</a></li>
                                        <li><a href="{{ route('inventory.inventorylocation') }}"">Inventory Locations</a></li>
                                        <li><a href="">Units of Measure</a></li>
                                        <li><a href="">Reorder Levels</a></li>
                                        <li><a href="">Sales Pricing</a></li>
                                        <li><a href="">Purchasing Pricing</a></li>
                                        <li><a href="">Standard Cost</a></li>                               
                                    </ul>
                                </li>
                                <li class="has_sub">
                                    <a href="" class="waves-effect">
                                        <i class="mdi mdi-settings"></i>
                                        <span> Sales
                                            <span class="pull-right">
                                                <i class="mdi mdi-chevron-right"></i>
                                            </span>
                                        </span>
                                    </a>
                                    <ul class="list-unstyled">
                                        <li><a href="">Sales Quotation Entry</a></li>    
                                        <li><a href="">Sales Order Entry</a></li>    
                                        <li><a href="">Direct Delivery</a></li>    
                                        <li><a href="">Direct Invoice</a></li>    
                                        <li><a href="">Delivery Against Sales Orders</a></li>    
                                        <li><a href="">Invoice Against Sales Delivery</a></li>    
                                        <li><a href="">Template Delivery</a></li>    
                                        <li><a href="">Template Invoice</a></li>    
                                        <li><a href="">Create & Print Recurrent Invoices</a></li>
                                        <li><a href="">Customer Payments</a></li>    
                                        <li><a href="">Customer Credit Notes</a></li>    
                                        <li><a href="">Allocate Customer Payments</a></li>    
                                        <li><a href="">Sales Qoutation Inquiry</a></li>    
                                        <li><a href="">Sales Order Inquiry</a></li>        
                                        <li><a href="">Customer Transaction Inquiry</a></li>    
                                        <li><a href="">Customer Allocation Inquiry</a></li>    
                                        <li><a href="">Customer & Sales Reports</a></li>    
                                        <li><a href="">Add & Manage Customers</a></li>    
                                        <li><a href="">Customer Branches</a></li>    
                                        <li><a href="">Sales Groups</a></li>    
                                        <li><a href="">Recurrent Invoices</a></li>    
                                        <li><a href="">Sales Types</a></li>    
                                        <li><a href="">Sales Persons</a></li>    
                                        <li><a href="">Sales Areas</a></li>    
                                        <li><a href="">Credit Status Setup</a></li>    
                                    </ul>
                                </li>
                                <li class="has_sub">
                                    <a href="" class="waves-effect">
                                        <i class="mdi mdi-settings"></i>
                                        <span> Purchase
                                            <span class="pull-right">
                                                <i class="mdi mdi-chevron-right"></i>
                                            </span>
                                        </span>
                                    </a>
                                    <ul class="list-unstyled">
                                          
                                        <li><a href="">Purchase Order Entry</a></li> 
                                        <li><a href="">Outstanding Purchase Orders Maintenance</a></li> 
                                        <li><a href="">Direct GRN</a></li> 
                                        <li><a href="">Direct Invoice</a></li> 
                                        <li><a href="">Payment to Suppliers</a></li> 
                                        <li><a href="">Supplier Invoices</a></li> 
                                        <li><a href="">Supplier Credit Notes</a></li>                             
                                        <li><a href="">Allocate Supplier Payments</a></li> 
                                        <li><a href="">Purchase Orders Inquiry</a></li> 
                                        <li><a href="">Supplier Transaction Inquiry</a></li> 
                                        <li><a href="">Supplier Allocation Inquiry</a></li> 
                                        <li><a href="">Supplier & Purchasing Reports</a></li> 
                                        <li><a href="">Suppliers</a></li>                        
                                    </ul>
                                </li>

                                <li class="has_sub">
                                    <a href="" class="waves-effect">
                                        <i class="mdi mdi-package-variant"></i>
                                        <span> Human Resource
                                            <span class="pull-right">
                                                <i class="mdi mdi-chevron-right"></i>
                                            </span>
                                        </span>
                                    </a>
                                    <ul class="list-unstyled">
                                        <li><a href="">Employee - Information</a></li>
                                        <li><a href="">Employee Salary Structure</a></li>
                                        <li><a href="">Employee Extra Salary</a></li>
                                        <li><a href="">Salary Process Month</a></li>
                                        <li><a href="">Rollback Process Month</a></li>
                                        <li><a href="">JV Salary Process Month</a></li>
                                        <li><a href="">JV Settlement</a></li>
                                        <li><a href="">Upload CV</a></li>
                                        <li><a href="">Employee Dashboard</a></li>
                                        <li><a href="">Leave Application Form</a></li>
                                        <li><a href="">Loan Application Form</a></li>
                                        <li><a href="">Advance Salary Application Form</a></li>
                                        <li><a href="">Employee Evaluation Form</a></li>
                                        <li><a href="">Employee Increment And Promotion Form</a></li>
                                        <li><a href="">Employee Attendance</a></li>
                                        <li><a href="">Employees Assets Record</a></li>
                                        <li><a href="">Add Employee Asset</a></li>
                                        <li><a href="">Asset Units of Measure</a></li>
                                        <li><a href="">Asset Item Categories</a></li>
                                        <li><a href="">Asset Items Entry</a></li>
                                        <li><a href="">Employee Job Info Approval</a></li>
                                        <li><a href="">Employee Remaining Leave Inquiry</a></li>
                                        <li><a href="">Leave Approve Inquiry</a></li>
                                        <li><a href="">Loan Approve Inquiry</a></li>
                                        <li><a href="">Advance Salary Approve Inquiry</a></li>
                                        <li><a href="">Employee Increment And Promotion Inquiry</a></li>
                                        <li><a href="">Employee Retirement Inquiry</a></li>
                                        <li><a href="">Employee Fixed Bonus Inquery</a></li>
                                        <li><a href="">Extra Salary History</a></li>
                                        <li><a href="">Extra Deduction History</a></li>
                                        <li><a href="">Salary Sheet View</a></li>
                                        <li><a href="">Extra OT View</a></li>
                                        <li><a href="">Bank Statements</a></li>
                                        <li><a href="">Monthly Salary Process acknoledgement</a></li>
                                        <li><a href="">Payroll Reports</a></li>
                                        <li><a href="">Employee - Final Settlement</a></li>
                                        <li><a href="">Location</a></li>
                                        <li><a href="">Department</a></li>
                                        <li><a href="">Add Site/Office</a></li>
                                        <li><a href="">Designation</a></li>
                                        <li><a href="">Insert Educational Degree</a></li>
                                        <li><a href="">Major Subject</a></li>
                                        <li><a href="">Grade</a></li>
                                        <li><a href="">Bank Accounts</a></li>
                                        <li><a href="">Grade Leave Setup</a></li>
                                        <li><a href="">Gazetted Holidays</a></li>
                                        <li><a href="">Weekend Setup</a></li>
                                        <li><a href="">Monthly Offday Settings</a></li>
                                        <li><a href="">Breakup Formula </a></li>
                                        <li><a href="">Loan Type Setup</a></li>
                                        <li><a href="">Bonus Type Settings</a></li>
                                        <li><a href="">Extra Salary Head Setting</a></li>
                                        <li><a href="">Extra Salary Deduction Setting</a></li>
                                        <li><a href="">Retirement Time Settings</a></li>
                                    </ul>
                                </li>
                            <!--
                                <li class="has_sub">
                                    <a href="" class="waves-effect">
                                        <i class="mdi mdi-package-variant"></i>
                                        <span> Permissions
                                            <span class="pull-right">
                                                <i class="mdi mdi-chevron-right"></i>
                                            </span>
                                        </span>
                                    </a>
                                    <ul class="list-unstyled">
                                        <li><a href="/admin/product/create">Add New</a></li>
                                        <li><a href="/admin/product">Product List</a></li>
                                        <li><a href="/admin/category">Category</a></li>
                                    </ul>
                                </li>
                            -->    

                                @endif


                            @if(Auth::user()->roles_id == 1 || Auth::user()->roles_id == 2)    
                                <li class="menu-title">Settings</li>
                                <li>
                                    <a href="/users" class="waves-effect">
                                        <i class="mdi  mdi-view-dashboard"></i>
                                        <span>Users</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/fiscalyear" class="waves-effect">
                                        <i class="mdi  mdi-calendar"></i>
                                        <span>Fiscal Year</span>
                                    </a>
                                </li>
                                @if(Auth::user()->roles_id == 1)    
                                <li>
                                    <a href="/schools" class="waves-effect">
                                        <i class="mdi  mdi-view-dashboard"></i>
                                        <span>Schools</span>
                                    </a>
                                </li>
                                @endif
                            @endif


                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End -->
