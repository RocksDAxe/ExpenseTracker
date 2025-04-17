<?php
include 'db.php';
session_start();

// Handle budget form submission
if (isset($_POST['set_budget'])) {
$_SESSION['budget_limit'] = $_POST['budget_limit'];
}

// Budget and Expenses Calculations
$budget_limit = $_SESSION['budget_limit'] ?? 0;
$result_total = $conn->query("SELECT SUM(amount) as total FROM expenses");
$total_spent = $result_total->fetch_assoc()['total'] ?? 0;
$progress = $budget_limit > 0 ? ($total_spent / $budget_limit) * 100 : 0;

// Get category data for pie chart
$category_data = [];
$category_query = $conn->query("SELECT category, SUM(amount) as total FROM expenses GROUP BY category");
while ($row = $category_query->fetch_assoc()) {
$category_data[$row['category']] = $row['total'];
}

// Get monthly summary
$monthly_summary = $conn->query("SELECT DATE_FORMAT(date, '%Y-%m') as month, SUM(amount) as total FROM expenses GROUP BY month ORDER BY month DESC");

// CSV Export
if (isset($_GET['export']) && $_GET['export'] == 'csv') {
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="expenses.csv"');
$output = fopen('php://output', 'w');
fputcsv($output, ['Title', 'Amount', 'Category', 'Date']);
$csv_query = $conn->query("SELECT title, amount, category, date FROM expenses ORDER BY date DESC");
while ($row = $csv_query->fetch_assoc()) {
fputcsv($output, $row);
}
fclose($output);
exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Expense Tracker</title>
<style>
/* Same styles as before... */
body {
font-family: 'Segoe UI', sans-serif;
background-image: url("images/budgetimg.png");
background-size: cover;
background-repeat: no-repeat;
background-attachment: fixed;
margin: 0;
padding: 20px;
color: #ffffff;
}
h1, h2 { color:rgb(253, 253, 19); }
input, button, select {
margin: 5px;
padding: 10px;
font-size: 16px;
border-radius: 6px;
border: 1px solid #999;
background-color: rgba(255, 255, 255, 0.9);
color: #000;
}
button {
background-color: #0066cc;
color: #fff;
border: none;
cursor: pointer;
}
button:hover { background-color: #004a99; }
table {
width: 100%;
border-collapse: collapse;
background-color: rgba(242, 237, 237, 0.6);
margin-top: 20px;
border-radius: 10px;
overflow: hidden;
color: black;
}
th, td {
border: 1px solid #ddd;
padding: 10px;
text-align: center;
}
th {
background-color: rgba(28, 144, 233, 0.98);
font-weight: bold;
color: #fff;
}
a { color: #ff4c4c; text-decoration: none; }
a:hover { text-decoration: underline; }
.progress-bar {
background: #ccc;
width: 100%;
height: 20px;
border-radius: 10px;
margin-top: 10px;
}
.progress { height: 100%; border-radius: 10px; }
.dark-mode {
background-color: #111 !important;
color: white !important;
}
.dark-mode input, .dark-mode button, .dark-mode select {
background-color: #333 !important;
color: white !important;
border: 1px solid #aaa;
}
.dark-mode table {
background-color: rgba(255, 255, 255, 0.1) !important;
color: white !important;
}
</style>
</head>
<body>

<button onclick="toggleDarkMode()" style="float:right;">🌙 Dark Mode</button>
<h1>Expense Tracker</h1>

<!-- 💸 Budget Form -->
<h2>Set Monthly Budget</h2>
<form method="POST" action="">
<input type="number" name="budget_limit" placeholder="Enter Monthly Budget" required>
<button type="submit" name="set_budget">Set Budget</button>
</form>
<div>
<p>Budget: $<?= $budget_limit ?> | Spent: $<?= $total_spent ?></p>
<div class="progress-bar">
<div class="progress" style="width: <?= min($progress, 100) ?>%; background-color:
<?php
if ($progress < 50) echo '#4caf50';
elseif ($progress < 80) echo '#ff9800';
else echo '#f44336';
?>;"></div>
</div>
</div>

<!-- ✍️ Expense Form -->
<form action="add.php" method="POST">
<input type="text" name="title" placeholder="Expense Title" required>
<input type="number" name="amount" step="0.01" placeholder="Amount" required>
<select name="category" required>
<option value="">Select Category</option>
<option value="Food">Food</option>
<option value="Rent">Rent</option>
<option value="Travel">Travel</option>
<option value="Shopping">Shopping</option>
<option value="Utilities">Utilities</option>
<option value="Entertainment">Entertainment</option>
<option value="Other">Other</option>
</select>
<input type="date" name="date" required>
<button type="submit">Add Expense</button>
</form>

<!-- 📋 Expenses Table + PDF & CSV -->
<h2>All Expenses
<button onclick="generatePDF()">📄 Export PDF</button>
<a href="?export=csv"><button>💾 Export CSV</button></a>
</h2>
<table id="expenseTable">
<tr>
<th>Title</th>
<th>Amount</th>
<th>Category</th>
<th>Date</th>
<th>Action</th>
</tr>
<?php
$result = $conn->query("SELECT * FROM expenses ORDER BY date DESC");
while ($row = $result->fetch_assoc()):
?>
<tr>
<td><?= htmlspecialchars($row['title']); ?></td>
<td>$<?= htmlspecialchars($row['amount']); ?></td>
<td><?= htmlspecialchars($row['category']); ?></td>
<td><?= htmlspecialchars($row['date']); ?></td>
<td><a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Delete this entry?')">Delete</a></td>
</tr>
<?php endwhile; ?>
<tr style="font-weight:bold; background-color:#eee;"><td>Total</td><td colspan="4">$<?= number_format($total_spent, 2) ?></td></tr>
</table>

<!-- 📅 Monthly Summary -->
<h2>Monthly Expense Summary</h2>
<table>
<tr><th>Month</th><th>Total Spent</th></tr>
<?php while ($row = $monthly_summary->fetch_assoc()): ?>
<tr>
<td><?= $row['month']; ?></td>
<td>$<?= number_format($row['total'], 2); ?></td>
</tr>
<?php endwhile; ?>
</table>

<!-- 📄 Category-wise PDF Download -->
<button onclick="downloadCategoryPDF()">📄 Download Category-wise PDF</button>

<!-- ⚠️ Budget Exceeded Alert -->
<?php if ($budget_limit > 0 && $total_spent > $budget_limit): ?>
<script>alert("⚠️ Alert: You have exceeded your monthly budget!");</script>
<?php endif; ?>

<!-- 📊 Pie Chart -->
<h2>Spending Breakdown</h2>
<canvas id="expenseChart" width="200px" height="200px"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('expenseChart').getContext('2d');
const expenseChart = new Chart(ctx, {
type: 'pie',
data: {
labels: <?= json_encode(array_keys($category_data)) ?>,
datasets: [{
data: <?= json_encode(array_values($category_data)) ?>,
backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56','#4BC0C0', '#9966FF', '#FF9F40', '#888888']
}]
},
options: {
responsive: true,
plugins: {
legend: {
position: 'bottom',
labels: { color: 'white' }
}
}
}
});
</script>

<!-- 🌙 Dark Mode Toggle -->
<script>
function toggleDarkMode() {
document.body.classList.toggle('dark-mode');
}
</script>

<!-- 📄 Table PDF Export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
async function generatePDF() {
const { jsPDF } = window.jspdf;
const doc = new jsPDF();
doc.text("Expense Report", 10, 10);
const table = document.getElementById("expenseTable");
const rows = [...table.rows].map(row => [...row.cells].map(cell => cell.innerText));
let y = 20;
for (let i = 0; i < rows.length; i++) {
doc.text(rows[i].join(" | "), 10, y);
y += 10;
if (y > 270) {
doc.addPage();
y = 20;
}
}
doc.save("expense_report.pdf");
}

// 📄 Category-wise PDF Download
function downloadCategoryPDF() {
const { jsPDF } = window.jspdf;
const doc = new jsPDF();
doc.setFontSize(14);
doc.text("Expense Report (Grouped by Category)", 10, 10);
let y = 20;

<?php
$category_result = $conn->query("SELECT DISTINCT category FROM expenses ORDER BY category ASC");
while ($cat_row = $category_result->fetch_assoc()):
$category = $cat_row['category'];
$expense_result = $conn->query("SELECT title, amount, date FROM expenses WHERE category = '$category' ORDER BY date DESC");
$lines = [];
while ($row = $expense_result->fetch_assoc()) {
$lines[] = $row['title'] . ' - $' . number_format($row['amount'], 2) . ' on ' . $row['date'];
}
?>
doc.setFont('helvetica', 'bold');
doc.text("Category: <?= $category ?>", 10, y);
y += 8;
doc.setFont('helvetica', 'normal');
<?php foreach ($lines as $line): ?>
doc.text("• <?= $line ?>", 12, y);
y += 8;
if (y > 270) {
doc.addPage();
y = 20;
}
<?php endforeach; ?>
y += 10;
<?php endwhile; ?>

doc.save("Category_Wise_Expense_Report.pdf");
}
</script>
</body>
</html>
