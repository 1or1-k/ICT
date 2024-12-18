<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>納税の義務</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        /* ヘッダータイトルバー */
        .header {
            background-color: #f2f2f2;
            color: #333;
            text-align: center;
            padding: 10px;
            position: relative;
        }

        .header img {
            position: absolute;
            left: 10px;
            top: 10px;
        }

        .header h1 {
            font-size: 1.5em;
            margin: 0;
            padding: 0;
        }

        /* 戻るボタン */
        .back-btn {
            position: absolute;
            left: 10px;
            top: 10px;
            font-size: 1em;
            text-decoration: none;
            color: #007BFF;
        }
         /* ボタンの基本スタイル */
        .number-btn {
            display: block;
            padding: 10px 15px;
            margin: 5px;
            border: 2px solid #ffd27f; /* 薄い黄色のボーダー */
            border-radius: 10px;
            background-color: #fff7e6; /* ボタンの背景色 */
            color: blue; /* ボタンの文字色は青 */
            font-size: 1.5em;
            text-decoration: none; /* リンクの下線を消す */
            cursor: pointer;
            margin-bottom: 10px;
        }

        /* ボタンがクリックされた後、文字色が赤になる */
        .number-btn:visited {
            color: red; /* クリック後の文字色 */
        }

        /* ホバー時のスタイル */
        .number-btn:hover {
            background-color: #ffeecc; /* ホバー時にボタン背景が少し明るくなる */
        }


        
        /* コンテンツ部分 */
        .content {
            padding: 20px;
            background-color: white;
        }

        /* 広告エリア */
        .ad {
            background-color: #ccf;
            padding: 10px;
            text-align: center;
            font-size: 0.9em;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /* 底部导航栏 */
        .footer {
            background-color: #fff;
            border-top: 1px solid #ddd;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 50px;
            text-align: center;
        }

        .footer a {
            margin: 0 10px;
            text-decoration: none;
            color: #007BFF;
        }
    </style>
</head>
<body>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        header {
            margin: 20px;
        }

        button {
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
        }

        .panel {
            display: none;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            padding: 20px;
            position: absolute;
            top: 100px;
            left: 50%;
            transform: translateX(-50%);
            width: 300px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .panel input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
        }

        #adminPanel {
            background-color: #e9f9e9;
        }
    </style>

    <!-- ヘッダータイトルバー -->
    <div class="header">
        <a href="#" class="back-btn">戻る</a>
        <h1>Taxsea💧</h1>
        <div class="plan-info">
            plan: Free
            <input type="text" name="name" placeholder="検索してみて">
            <button id="loginButton" onclick="showLoginPanel()">ログイン・新規登録</button>
            
            <div id="loginPanel" class="panel">
                <h2>ログイン</h2>
                <input type="text" id="loginUserId" placeholder="ユーザーID"><br>
                <input type="password" id="loginPassword" placeholder="パスワード"><br>
                <button onclick="login()">ログインする</button>
                <button onclick="hidePanel()">閉じる</button>

                <div>アカウントを作成しませんか？</div>
                <button id="registerButton" onclick="showRegisterPanel()">＋新規登録</button>
            </div>
        
            <div id="registerPanel" class="panel">
                <h2>新規登録</h2>
                <input type="text" id="registerUserId" placeholder="ユーザーID"><br>
                <input type="password" id="registerPassword" placeholder="パスワード"><br>
                <button onclick="register()">登録する</button>
                <button onclick="hidePanel()">閉じる</button>
            </div>
        
            <div id="adminPanel" class="panel">
                <h2>管理パネル</h2>
                <button onclick="registerMember()">メンバー登録</button>
                <button onclick="review()">復習</button>
                <button onclick="logout()">ログアウト</button>
                <button onclick="hidePanel()">閉じる</button>
            </div>
        
            <script>
                function showLoginPanel() {
                    hideAllPanels();
                    document.getElementById("loginPanel").style.display = "block";
                }
        
                function showRegisterPanel() {
                    hideAllPanels();
                    document.getElementById("registerPanel").style.display = "block";
                }
        
                function login() {
                    const userId = document.getElementById("loginUserId").value;
                    const password = document.getElementById("loginPassword").value;
        
                    const storedUserId = localStorage.getItem('userId');
                    const storedPassword = localStorage.getItem('password');
        
                    if (userId === storedUserId && password === storedPassword) {
                        alert("ログイン成功！");
                        document.getElementById("loginButton").textContent = storedUserId+"さん";
                        document.getElementById("loginButton").onclick = showAdminPanel;
                        document.getElementById("registerButton").style.display = "none";
                        hideAllPanels();
                    } else {
                        alert("ユーザーIDまたはパスワードが間違っています。");
                    }
                }
        
                function register() {
                    const userId = document.getElementById("registerUserId").value;
                    const password = document.getElementById("registerPassword").value;
        
                    if (userId && password) {
                        localStorage.setItem('userId', userId);
                        localStorage.setItem('password', password);
                        alert("新規登録成功！");
                        hideAllPanels();
                    } else {
                        alert("ユーザーIDとパスワードを入力してください。");
                    }
                }
        
                function showAdminPanel() {
                    hideAllPanels();
                    document.getElementById("adminPanel").style.display = "block";
                }
        
                function registerMember() {
                    alert("メンバー登録機能");
                }
        
                function review() {
                    alert("復習機能");
                }
        
                function logout() {
                    alert("ログアウトしました。");
                    document.getElementById("loginButton").textContent = "ログイン";
                    document.getElementById("loginButton").onclick = showLoginPanel;
                    document.getElementById("registerButton").style.display = "inline-block";
                    hideAllPanels();
                }
        
                function hideAllPanels() {
                    document.getElementById("loginPanel").style.display = "none";
                    document.getElementById("registerPanel").style.display = "none";
                    document.getElementById("adminPanel").style.display = "none";
                }
        
                function hidePanel() {
                    hideAllPanels();
                }
            </script>
        </div>
    </div>

    <!-- メインコンテンツ -->
    <div class="content">
        <h2>納税の義務</h2>
        <p>日本の国民の三大義務は、以下の通りです。</p>
        <ol>
            <li>勤労の義務（日本国憲法第27条）</li>
            <li>納税の義務（日本国憲法第30条）</li>
            <li>子どもに普通教育を受けさせる義務（日本国憲法第26条第2項）</li>
        </ol>
        <p>これらの義務は、国民としての基本的な責務として定められています。</p>
        <p>納税の義務は、国民が法律に基づいて税金を納める義務を指します。日本国憲法第30条には「国民は、法律の定めるところにより、納税の義務を負う」と記されています。</p>
    </div>
    <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; height: auto;">
        <iframe width="560" height="315" 
        src="https://www.youtube.com/embed/lZF-zeWwQBc?si=N-9HHgZCIl2yLW1L" 
        title="YouTube video player" frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
        </iframe>

    </div>
    


    <!-- 広告エリア -->
    <div class="ad">
        <p>広告</p>
        <a href="https://ads.google.com/intl/ja_jp/home/">詳しくはこちら</a>

    </div>

    <!-- フッターナビゲーション -->
    <div class="footer">
        <a href="#">ホーム</a>
        <a href="kennsaku.html">検索</a>
        <a href="#">プロフィール</a>
    </div>

</body>
</html>
