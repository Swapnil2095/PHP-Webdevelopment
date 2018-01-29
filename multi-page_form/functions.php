<?php
function __($text) {
  return htmlspecialchars($text, ENT_COMPAT);
}

function checked($value, $array) {
  if ( in_array( $value, $array ) ) {
    echo 'checked="checked"';
  }
}

function text( $name, $id, $label, $placeholder, $type = 'text' ) {?>
  <div class="form-group">
    <label for="<?php echo $id; ?>"><?php echo $label; ?></label>
    <input type="<?php echo $type; ?>" name="<?php echo $name; ?>" class="form-control"
           id="<?php echo $id; ?>" placeholder="<?php echo $placeholder; ?>"
           value="<?php echo isset($_SESSION[$name]) ? __($_SESSION[$name]) : ''; ?>">
  </div>
<?php }

function checkbox( $name, $id, $label, $options = array() ) {?>
  <div class="form-group">
    <p><?php echo $label; ?></p>
    <?php foreach ( $options as $value => $title ) : ?>
      <label class="checkbox-inline" for="<?php echo $id; ?>">
        <input type="checkbox" name="<?php echo $name; ?>[]" value="<?php echo $value; ?>" <?php isset($_SESSION['interests']) ? checked($value, $_SESSION['interests']) : ''; ?>>
        <span class="checkbox-title"><?php echo $title; ?></span>
      </label>
    <?php endforeach; ?>
  </div>
<?php }

function submit($value = 'submit', $class = 'btn btn-primary') {?>
  <button type="submit" class="<?php echo $class; ?>"><?php echo $value; ?></button>
<?php }

function db_connect() {
  $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  return $conn;
}

function insert($data = array()) {
  // Connect to database
  $conn = db_connect();

  // Whitelist and convert to variables
  $name = $data['name'];
  $email = $data['email'];
  $interests = $data['interests'];
  $address = $data['address'];
  $city = $data['city'];
  $state = $data['state'];

  // Serialize interests for now
  $interests = serialize($interests);

  // Prepare and bind
  $stmt = $conn->prepare("INSERT INTO mpforms (name, email, interests, address, city, state) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssss", $name, $email, $interests, $address, $city, $state);

  // Execute
  $insert = $stmt->execute();

  // Return status
  if ( $insert ) {
    echo $conn->insert_id;
    return $conn->insert_id;
  }

  return false;
}

function show_results($insert_id) {
  // Connect to database
  $conn = db_connect();

  // Prepare and bind
  $stmt = $conn->prepare("SELECT name, email, interests, address, city, state FROM mpforms WHERE ID = ?");
  $stmt->bind_param("d", $insert_id);

  // Execute and bind result;
  $stmt->execute();
  $response = $stmt->get_result();
  $results = $response->fetch_array(MYSQLI_ASSOC);

  return $results;
}
