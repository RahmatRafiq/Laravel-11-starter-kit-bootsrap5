<x-app-layout>

    <!-- --------------start main part --------------- -->
    <main>
        <h1>Dashbord</h1>
        <div class="date">
            <input type="date">
        </div>
        <div class="insights">
            <!-- start seling -->
            <div class="sales">
                <span class="material-symbols-sharp">trending_up</span>
                <div class="middle">

                    <div class="left">
                        <h3>Total Sales</h3>
                        <h1>$25,024</h1>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle r="30" cy="40" cx="40"></circle>
                        </svg>
                        <div class="number">
                            <p>80%</p>
                        </div>
                    </div>

                </div>
                <small>Last 24 Hours</small>
            </div>
            <!-- end seling -->
            <!-- start expenses -->
            <div class="expenses">
                <span class="material-symbols-sharp">local_mall</span>
                <div class="middle">

                    <div class="left">
                        <h3>Total Sales</h3>
                        <h1>$25,024</h1>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle r="30" cy="40" cx="40"></circle>
                        </svg>
                        <div class="number">
                            <p>80%</p>
                        </div>
                    </div>

                </div>
                <small>Last 24 Hours</small>
            </div>
            <!-- end seling -->
            <!-- start seling -->
            <div class="income">
                <span class="material-symbols-sharp">stacked_line_chart</span>
                <div class="middle">

                    <div class="left">
                        <h3>Total Sales</h3>
                        <h1>$25,024</h1>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle r="30" cy="40" cx="40"></circle>
                        </svg>
                        <div class="number">
                            <p>80%</p>
                        </div>
                    </div>

                </div>
                <small>Last 24 Hours</small>
            </div>
            <!-- end seling -->

        </div>
        <!-- end insights -->
        <div class="recent_order">
            <h2>Recent Orders</h2>
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Product Number</th>
                        <th>Payments</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Mini USB</td>
                        <td>4563</td>
                        <td>Due</td>
                        <td class="warning">Pending</td>
                        <td class="primary">Details</td>
                    </tr>
                    <tr>
                        <td>Mini USB</td>
                        <td>4563</td>
                        <td>Due</td>
                        <td class="warning">Pending</td>
                        <td class="primary">Details</td>
                    </tr>
                    <tr>
                        <td>Mini USB</td>
                        <td>4563</td>
                        <td>Due</td>
                        <td class="warning">Pending</td>
                        <td class="primary">Details</td>
                    </tr>
                    <tr>
                        <td>Mini USB</td>
                        <td>4563</td>
                        <td>Due</td>
                        <td class="warning">Pending</td>
                        <td class="primary">Details</td>
                    </tr>
                </tbody>
            </table>
            <a href="#">Show All</a>
        </div>
    </main>
    <!------------------end main------------------->

    <!---------------- start right main---------------------->
    <div class="right">
        <div class="top">
            <button id="menu_bar">
                <span class="material-symbols-sharp">menu</span>
            </button>
            <div class="theme-toggler">
                <span class="material-symbols-sharp active">light_mode</span>
                <span class="material-symbols-sharp">dark_mode</span>
            </div>
            <div class="profile">
                <div class="info">
                    <p><b>Babar</b></p>
                    <p>Admin</p>
                    <small class="text-muted"></small>
                </div>
                <div class="profile-photo">
                    <img src="./images/profile-1.jpg" alt="" />
                </div>
            </div>
        </div>
        <div class="recent_updates">
            <h2>Recent Update</h2>
            <div class="updates">
                <div class="update">
                    <div class="profile-photo">
                        <img src="./images/profile-4.jpg" alt="" />
                    </div>
                    <div class="message">
                        <p><b>Babar</b> Recived his order of USB</p>
                    </div>
                </div>
                <div class="update">
                    <div class="profile-photo">
                        <img src="./images/profile-3.jpg" alt="" />
                    </div>
                    <div class="message">
                        <p><b>Ali</b> Recived his order of USB</p>
                    </div>
                </div>
                <div class="update">
                    <div class="profile-photo">
                        <img src="./images/profile-2.jpg" alt="" />
                    </div>
                    <div class="message">
                        <p><b>Ramzan</b> Recived his order of USB</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="sales-analytics">
            <h2>Sales Analytics</h2>
            <div class="item onlion">
                <div class="icon">
                    <span class="material-symbols-sharp">shopping_cart</span>
                </div>
                <div class="right_text">
                    <div class="info">
                        <h3>Onlion Orders</h3>
                        <small class="text-muted">Last seen 2 Hours</small>
                    </div>
                    <h5 class="danger">-17%</h5>
                    <h3>3849</h3>
                </div>
            </div>
            <div class="item onlion">
                <div class="icon">
                    <span class="material-symbols-sharp">shopping_cart</span>
                </div>
                <div class="right_text">
                    <div class="info">
                        <h3>Onlion Orders</h3>
                        <small class="text-muted">Last seen 2 Hours</small>
                    </div>
                    <h5 class="success">-17%</h5>
                    <h3>3849</h3>
                </div>
            </div>
            <div class="item onlion">
                <div class="icon">
                    <span class="material-symbols-sharp">shopping_cart</span>
                </div>
                <div class="right_text">
                    <div class="info">
                        <h3>Onlion Orders</h3>
                        <small class="text-muted">Last seen 2 Hours</small>
                    </div>
                    <h5 class="danger">-17%</h5>
                    <h3>3849</h3>
                </div>
            </div>
        </div>
        <div class="item add_product">
            <div>
                <span class="material-symbols-sharp">add</span>
            </div>
        </div>
    </div>
    <!---------------- end right main---------------------->
</x-app-layout>
