# CovidVaccineManagementSystem
Web-based application for COVID vaccination database based on MySQL and PHP. The application allows users to record and manage vaccination information for patients. The application is designed to perform the following tasks:

1️⃣Add a New Patient:

The application first prompts the user for the OHIP (Ontario Health Insurance Plan) number of the patient.
If the patient doesn't exist in the database, it will ask for the patient's information (excluding the spouse), and add the patient to the database.

2️⃣Record Vaccination:

Once the patient is in the database, the user can record vaccination data for that patient.
The user is prompted to select the clinic where the vaccine was administered from a list of available clinics.
The user should also provide the lot number of the vaccine administered.
The application records the vaccination and updates the vaccination table.

3️⃣List Patient's Vaccinations:

After updating the vaccination data, the user can list all vaccinations for a specific patient.
The list includes the clinic where the vaccine was administered, the lot number, and other relevant information.

4️⃣Vaccine Type and Vaccination Sites:

Users can choose a vaccine type and view a list of vaccination sites that offer or will offer that type of vaccine.
The list also shows the total number of vaccine doses shipped to each site.

5️⃣: Patient Vaccination Status:

Users can select a patient from the list of patients in the database.
The application displays the patient's vaccination status, including their name, OHIP number, the date of the vaccine administration, and the type of vaccine given.

6️⃣: List Workers at a Vaccination Site:

Users can choose a vaccination site.
The application displays a list of workers at the chosen site, showing their names and whether they are doctors or nurses.
