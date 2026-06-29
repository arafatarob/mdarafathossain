<?php
session_start();
require('../config/db.php');

$userId = $_SESSION['user_id'];
$stmt = $conn->prepare("
  SELECT users.id, users.name, users.email, users.role, users.password, users.created_at, users.users_activity, role.role_name
  FROM users
  INNER JOIN role ON users.role = role.id
  WHERE users.id = ?
");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$me = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profile</title>
  <script src="https://kit.fontawesome.com/e68d9b315c.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../assets/dashboard.css">
  <style>
    .profile-wrap {
      max-width: 860px;
    }

    /* Hero card */
    .p-hero {
      background: var(--card);
      border: 1px solid var(--border-cyan);
      border-radius: var(--radius);
      backdrop-filter: var(--backdrop-filter);
      overflow: hidden;
      margin-bottom: 20px;
    }

    .p-hero-banner {
      height: 100px;
      background: linear-gradient(135deg, rgba(0,229,255,0.15) 0%, rgba(168,85,247,0.15) 100%);
      position: relative;
    }

    .p-hero-banner::after {
      content: "";
      position: absolute;
      inset: 0;
      background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%2300E5FF' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    .p-hero-body {
      padding: 0 28px 28px;
      position: relative;
    }

    .p-avatar-wrap {
      display: flex;
      align-items: flex-end;
      gap: 20px;
      margin-top: -36px;
      margin-bottom: 20px;
    }

    .p-avatar {
      width: 72px;
      height: 72px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--cyan), var(--purple));
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: var(--font-main);
      font-size: 28px;
      font-weight: 700;
      color: #fff;
      flex-shrink: 0;
      border: 3px solid var(--bg2);
      box-shadow: 0 0 30px rgba(0,229,255,0.30);
    }

    .p-name-block h2 {
      font-family: var(--font-main);
      font-size: 22px;
      font-weight: 700;
      color: var(--text);
      letter-spacing: -0.4px;
      margin-bottom: 5px;
    }

    .p-role-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 3px 12px;
      border-radius: 20px;
      background: var(--cyan-dim);
      border: 1px solid var(--border-cyan);
      font-family: var(--font-main);
      font-size: 12px;
      font-weight: 600;
      color: var(--cyan);
      text-transform: capitalize;
    }

    .p-role-badge i { font-size: 8px; }

    /* Stats row */
    .p-stats {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1px;
      background: var(--border);
      border-top: 1px solid var(--border);
    }

    .p-stat {
      background: var(--card);
      padding: 18px 20px;
      display: flex;
      flex-direction: column;
      gap: 4px;
      transition: background 0.2s;
    }

    .p-stat:hover { background: rgba(0,229,255,0.03); }

    .p-stat-label {
      font-family: var(--font-body);
      font-size: 11px;
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 0.8px;
      color: var(--muted);
    }

    .p-stat-value {
      font-family: var(--font-main);
      font-size: 14px;
      font-weight: 600;
      color: var(--text);
    }

    /* Info grid */
    .p-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
      margin-bottom: 20px;
    }

    .p-info-card {
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      backdrop-filter: var(--backdrop-filter);
      padding: 20px 22px;
      display: flex;
      align-items: center;
      gap: 16px;
      transition: border-color 0.25s;
    }

    .p-info-card:hover { border-color: var(--border-cyan); }

    .p-info-icon {
      width: 40px;
      height: 40px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      font-size: 15px;
    }

    .p-info-icon.cyan {
      background: var(--cyan-dim);
      color: var(--cyan);
      border: 1px solid var(--border-cyan);
    }

    .p-info-icon.purple {
      background: var(--purple-dim);
      color: var(--purple);
      border: 1px solid var(--border-purple);
    }

    .p-info-text label {
      font-family: var(--font-body);
      font-size: 11px;
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 0.7px;
      color: var(--muted);
      display: block;
      margin-bottom: 3px;
    }

    .p-info-text span {
      font-family: var(--font-main);
      font-size: 14px;
      font-weight: 500;
      color: var(--text);
    }

    /* Edit password section */
    .p-edit-card {
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      backdrop-filter: var(--backdrop-filter);
      overflow: hidden;
    }

    .p-edit-header {
      padding: 16px 22px;
      border-bottom: 1px solid var(--border);
      display: flex;
      align-items: center;
      gap: 10px;
      background: rgba(168,85,247,0.03);
    }

    .p-edit-header i { color: var(--purple); font-size: 14px; }

    .p-edit-header h3 {
      font-family: var(--font-main);
      font-size: 14px;
      font-weight: 600;
      color: var(--text);
    }

    .p-edit-body {
      padding: 22px;
      display: grid;
      grid-template-columns: 1fr 1fr 1fr auto;
      gap: 12px;
      align-items: flex-end;
    }

    .p-field {
      display: flex;
      flex-direction: column;
      gap: 6px;
      position: relative;
    }
    .p-field i {
    position: absolute;
    right: 9px;
    display: inline-block;
    top: 29px;
    color: var(--muted);
}

    .p-field label {
      font-family: var(--font-body);
      font-size: 11px;
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 0.7px;
      color: var(--muted);
    }

    .p-field input {
      height: 40px;
      background: rgba(255,255,255,0.04);
      border: 1px solid var(--border);
      border-radius: var(--radius-sm);
      padding: 0 14px;
      color: var(--text);
      font-family: var(--font-body);
      font-size: 13px;
      outline: none;
      transition: all 0.25s;
      width: 100%;
    }

    .p-field input:focus {
      border-color: var(--purple);
      background: var(--purple-dim);
      box-shadow: 0 0 0 3px rgba(168,85,247,0.10);
    }

    @media (max-width: 720px) {
      .p-grid { grid-template-columns: 1fr; }
      .p-stats { grid-template-columns: 1fr 1fr; }
      .p-edit-body { grid-template-columns: 1fr; }
      .p-avatar-wrap { flex-direction: column; align-items: flex-start; }
    }
  </style>
</head>
<body>

  <?php
    require("./common/header.php");
    require("./common/sidebar.php");
  ?>

  <main>
    <div class="profile-wrap">

      <div class="page-header">
        <div class="page-header-left">
          <h1 class="title">My Profile</h1>
        </div>
      </div>

      <!-- Hero Card -->
      <div class="p-hero">
        <div class="p-hero-banner"></div>
        <div class="p-hero-body">
          <div class="p-avatar-wrap">
            <div class="p-avatar">
              <?= strtoupper(substr($me['name'], 0, 1)) ?>
            </div>
            <div class="p-name-block">
              <h2><?= htmlspecialchars($me['name']) ?></h2>
              <span class="p-role-badge">
                <i class="fa-solid fa-circle"></i>
                <?= htmlspecialchars($me['role_name']) ?>
              </span>
            </div>
          </div>
        </div>

        <div class="p-stats">
          <div class="p-stat">
            <span class="p-stat-label">User ID</span>
            <span class="p-stat-value">#<?= htmlspecialchars($me['id']) ?></span>
          </div>
          <div class="p-stat">
            <span class="p-stat-label">Member Since</span>
            <span class="p-stat-value"><?= date("d M Y", strtotime($me['created_at'])) ?></span>
          </div>
          <div class="p-stat">
            <span class="p-stat-label">Last Active</span>
            <span class="p-stat-value">
              <?php
                if(!empty($me['users_activity'])){
                  $tz  = new DateTimeZone('Asia/Dhaka');
                  $lt  = new DateTime($me['users_activity'], $tz);
                  $now = new DateTime('now', $tz);
                  $d   = $now->diff($lt);
                  if($d->d < 1 && $d->h < 1 && $d->i < 1)       echo "Just Now";
                  elseif($d->d < 1 && $d->h < 1)                  echo $d->i . " min ago";
                  elseif($d->d < 1)                                echo $d->h . " hr ago";
                  else                                              echo $d->d . " day ago";
                } else {
                  echo "First login";
                }
              ?>
            </span>
          </div>
        </div>
      </div>

      <!-- Info Grid -->
      <div class="p-grid">
        <div class="p-info-card">
          <div class="p-info-icon cyan">
            <i class="fa-regular fa-envelope"></i>
          </div>
          <div class="p-info-text">
            <label>Email Address</label>
            <span><?= htmlspecialchars($me['email']) ?></span>
          </div>
        </div>

        <div class="p-info-card">
          <div class="p-info-icon purple">
            <i class="fa-solid fa-user-shield"></i>
          </div>
          <div class="p-info-text">
            <label>Role</label>
            <span><?= htmlspecialchars($me['role_name']) ?></span>
          </div>
        </div>

        <div class="p-info-card">
          <div class="p-info-icon cyan">
            <i class="fa-regular fa-calendar"></i>
          </div>
          <div class="p-info-text">
            <label>Account Created</label>
            <span><?= date("d M Y, h:i A", strtotime($me['created_at'])) ?></span>
          </div>
        </div>

        <div class="p-info-card">
          <div class="p-info-icon purple">
            <i class="fa-regular fa-clock"></i>
          </div>
          <div class="p-info-text">
            <label>Last Login</label>
            <span>
              <?php
                if(!empty($me['users_activity'])){
                  echo date("d M Y, h:i A", strtotime($me['users_activity']));
                } else {
                  echo "No activity yet";
                }
              ?>
            </span>
          </div>
        </div>
      </div>

      <!-- Change Password -->
      <div class="p-edit-card">
        <div class="p-edit-header">
          <i class="fa-solid fa-lock"></i>
          <h3>Change Password</h3>
        </div>
        <form action="../action/change_password.php" method="post">
          <div class="p-edit-body">
            <div class="p-field">
              <label>Current Password</label>
              <input type="password" class="passwordToggle" name="old_password" value="<?= htmlspecialchars($me['password']) ?>" placeholder="••••••••">
              <i class="fa-solid fa-eye-slash"></i>
            </div>
            <div class="p-field">
              <label>New Password</label>
              <input type="password" class="passwordToggle" name="new_password" placeholder="••••••••">
              <i class="fa-solid fa-eye-slash"></i>
            </div>
            <div class="p-field">
              <label>Confirm Password</label>
              <input type="password" class="passwordToggle" name="confirm_password" placeholder="••••••••">
              <i class="fa-solid fa-eye-slash"></i>
            </div>
            <div>
              <button type="submit" name="change_password" class="settings-btn bttn" style="height:40px;margin:0;white-space:nowrap;">
                Update Password
              </button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </main>

  <script src="../assets/dashboard.js" charset="utf-8"></script>
</body>
</html>