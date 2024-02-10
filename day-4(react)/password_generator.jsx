// Importing necessary hooks from React library
import { useState, useCallback, useEffect, useRef } from 'react'

// Defining the App component
function App() {
  // State variables to manage the password generation
  const [length, setLength] = useState(8); // Password length
  const [numberAllowed, setNumberAllowed] = useState(false); // Flag for including numbers in the password
  const [charAllowed, setCharAllowed] = useState(false); // Flag for including special characters in the password
  const [password, setPassword] = useState(""); // Generated password

  // useRef hook to reference the password input field
  const passwordRef = useRef(null);

  // useCallback hook to memoize the password generation function
  const passwordGenerator = useCallback(() => {
    let pass = ""; // Initialize an empty password string
    let str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"; // String containing only alphabets

    // If numbers are allowed, add them to the string
    if (numberAllowed) str += "0123456789";
    // If special characters are allowed, add them to the string
    if (charAllowed) str += "!@#$%^&*-_+=[]{}~`";

    // Loop to generate the password of specified length
    for (let i = 1; i <= length; i++) {
      let char = Math.floor(Math.random() * str.length); // Generate a random index within the string length
      pass += str.charAt(char); // Add the character at the generated index to the password
    }

    setPassword(pass); // Update the state with the generated password
  }, [length, numberAllowed, charAllowed, setPassword]); // Dependencies for the passwordGenerator function

  // useCallback hook to memoize the function to copy the password to the clipboard
  const copyPasswordToClipboard = useCallback(() => {
    // Select and copy the password to the clipboard
    passwordRef.current?.select(); // Select the password input field
    passwordRef.current?.setSelectionRange(0, 999); // Set the selection range to include the entire password
    window.navigator.clipboard.writeText(password); // Copy the selected password to the clipboard
  }, [password]); // Dependency for the copyPasswordToClipboard function

  // useEffect hook to generate the password whenever there's a change in the length or allowed characters
  useEffect(() => {
    passwordGenerator(); // Call the passwordGenerator function to generate a new password
  }, [length, numberAllowed, charAllowed, passwordGenerator]); // Dependencies for the useEffect hook

  // Return JSX for rendering the component
  return (
    <div className="w-full max-w-md mx-auto shadow-md rounded-lg px-4 py-3 my-8 bg-gray-800 text-orange-500">
      <h1 className='text-white text-center my-3'>Password generator</h1>
      {/* Password input field */}
      <div className="flex shadow rounded-lg overflow-hidden mb-4">
        <input
          type="text"
          value={password}
          className="outline-none w-full py-1 px-3"
          placeholder="Password"
          readOnly
          ref={passwordRef} // Reference to the password input field
        />
        {/* Button to copy the password to clipboard */}
        <button
          onClick={copyPasswordToClipboard}
          className='outline-none bg-blue-700 text-white px-3 py-0.5 shrink-0'
        >
          copy
        </button>
      </div>
      {/* Controls for password length and allowed characters */}
      <div className='flex text-sm gap-x-2'>
        {/* Slider to adjust password length */}
        <div className='flex items-center gap-x-1'>
          <input
            type="range"
            min={6}
            max={100}
            value={length}
            className='cursor-pointer'
            onChange={(e) => {setLength(e.target.value)}} // Update the password length
          />
          <label>Length: {length}</label>
        </div>
        {/* Checkbox to allow numbers in the password */}
        <div className="flex items-center gap-x-1">
          <input
            type="checkbox"
            defaultChecked={numberAllowed}
            id="numberInput"
            onChange={() => {
              setNumberAllowed((prev) => !prev); // Toggle the flag for including numbers
            }}
          />
          <label htmlFor="numberInput">Numbers</label>
        </div>
        {/* Checkbox to allow special characters in the password */}
        <div className="flex items-center gap-x-1">
          <input
            type="checkbox"
            defaultChecked={charAllowed}
            id="characterInput"
            onChange={() => {
              setCharAllowed((prev) => !prev); // Toggle the flag for including special characters
            }}
          />
          <label htmlFor="characterInput">Characters</label>
        </div>
      </div>
    </div>
  );
}

// Exporting the App component as default
export default App;