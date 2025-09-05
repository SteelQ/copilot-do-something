// Simple test for the Node.js application
const app = require('./index.js');

console.log('Running tests...');

// Test the hello function
try {
  const result = app.hello();
  if (result === 'Hello, World!') {
    console.log('✓ hello() returns correct value');
  } else {
    console.log('✗ hello() test failed');
    process.exit(1);
  }
} catch (error) {
  console.log('✗ Error testing hello():', error.message);
  process.exit(1);
}

console.log('All tests passed!');