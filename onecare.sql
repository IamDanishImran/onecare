/* ----- DATABASE SQL OneCare ----- */
/* ----- Create Table Section ----- */
CREATE TABLE activity (
  ActivityID INT NOT NULL AUTO_INCREMENT,
  title VARCHAR(100) NOT NULL,
  description VARCHAR(255) NOT NULL,
  address VARCHAR(100) NOT NULL,
  date DATE NOT NULL,
  receiver_ID INT,
  donor_ID INT,
  vol_ID INT,
  admin_ID INT,
  report_ID INT,
  PRIMARY KEY (ActivityID),
  INDEX (vol_ID),
  INDEX (receiver_ID),
  INDEX (donor_ID),
  INDEX (admin_ID),
  INDEX (report_ID),
  CONSTRAINT fk_volunteer
    FOREIGN KEY (vol_ID) 
    REFERENCES volunteer(VolunteerID)
    ON DELETE SET NULL, -- Set to NULL if volunteer is deleted (optional)
  CONSTRAINT fk_donor
    FOREIGN KEY (donor_ID) 
    REFERENCES donor(DonorID)
    ON DELETE SET NULL, -- Set to NULL if donor is deleted (optional)
  CONSTRAINT fk_receiver
    FOREIGN KEY (receiver_ID) 
    REFERENCES receiver(ReceiverID)
    ON DELETE SET NULL, -- Set to NULL if receiver is deleted (optional)
  CONSTRAINT fk_admin
    FOREIGN KEY (admin_ID) 
    REFERENCES admin(AdminID)
    ON DELETE SET NULL, -- Set to NULL if admin is deleted (optional)
  CONSTRAINT fk_report
    FOREIGN KEY (report_ID) 
    REFERENCES report(ReportID)
    ON DELETE SET NULL -- Set to NULL if report is deleted (optional)
);


CREATE TABLE admin (
  adminID int(11) NOT NULL AUTO_INCREMENT,
  username varchar(20) NOT NULL,
  password varchar(50) NOT NULL,  -- Increased length for better security
  report_ID int(11) DEFAULT NULL,
  receiver_ID int(11) DEFAULT NULL,
  donor_ID int(11) DEFAULT NULL,
  feedback_ID int(11) DEFAULT NULL,
  vol_ID int(11) DEFAULT NULL,
  Act_ID int(11) DEFAULT NULL,
  newsID int(11) DEFAULT NULL,  -- Combined ADD COLUMN with table creation
  PRIMARY KEY (adminID),
  KEY vol_ID (vol_ID),
  KEY receiver_ID (receiver_ID),
  KEY report_ID (report_ID),
  KEY donor_ID (donor_ID),
  KEY feedback_ID (feedback_ID),
  KEY Act_ID (Act_ID)
);

CREATE TABLE donor (
  DonorID int(11) NOT NULL AUTO_INCREMENT,
  email varchar(100) NOT NULL,
  item_type varchar(50) NOT NULL,
  description text NOT NULL,
  vol_ID int(11) NOT NULL,
  PRIMARY KEY (DonorID),
  KEY vol_ID (vol_ID)
);

CREATE TABLE feedback (
  FeedbackID int(11) NOT NULL AUTO_INCREMENT,
  email VARCHAR(255), -- Assuming email can be up to 255 characters long
  feedback TEXT, -- Using TEXT for potentially longer feedback content
  PRIMARY KEY (FeedbackID)
);


CREATE TABLE news (
  newsID int(11) NOT NULL AUTO_INCREMENT,
  title varchar(100) NOT NULL,
  content text NOT NULL,
  image varchar(255) DEFAULT NULL,
  PRIMARY KEY (newsID)
);

CREATE TABLE receiver (
  ReceiverID int(11) NOT NULL AUTO_INCREMENT,
  name varchar(100) NOT NULL,
  password varchar(50) NOT NULL,
  address varchar(100) NOT NULL,
  work varchar(20) NOT NULL,
  age tinyint(4) NOT NULL,
  district varchar(20) NOT NULL,
  phone varchar(15) NOT NULL,
  salary decimal(10,2) NOT NULL,
  PRIMARY KEY (ReceiverID)
);

CREATE TABLE report (
  ReportID int(11) NOT NULL AUTO_INCREMENT,
  time date NOT NULL,
  description varchar(100) NOT NULL,
  receiver_ID int(11) DEFAULT NULL,
  vol_ID int(11) DEFAULT NULL,
  PRIMARY KEY (ReportID),
  KEY receiver_ID (receiver_ID),
  KEY vol_ID (vol_ID)
);

CREATE TABLE volunteer (
  VolunteerID int(11) NOT NULL AUTO_INCREMENT,
  name varchar(100) NOT NULL,
  address varchar(100) NOT NULL,
  phone varchar(15) NOT NULL,
  password varchar(50) NOT NULL,
  age varchar(2) NOT NULL,
  work varchar(20) NOT NULL,
  PRIMARY KEY (VolunteerID)
);

/* ----- Foreign Key Constraints ----- */
ALTER TABLE activity
  ADD CONSTRAINT activity_ibfk_1 FOREIGN KEY (vol_ID) REFERENCES volunteer (VolunteerID),
  ADD CONSTRAINT activity_ibfk_2 FOREIGN KEY (receiver_ID) REFERENCES receiver (ReceiverID),
  ADD CONSTRAINT activity_ibfk_3 FOREIGN KEY (donor_ID) REFERENCES donor (DonorID);

ALTER TABLE admin
  ADD CONSTRAINT admin_ibfk_1 FOREIGN KEY (vol_ID) REFERENCES volunteer (VolunteerID),
  ADD CONSTRAINT admin_ibfk_2 FOREIGN KEY (receiver_ID) REFERENCES receiver (ReceiverID),
  ADD CONSTRAINT admin_ibfk_3 FOREIGN KEY (report_ID) REFERENCES report (ReportID),
  ADD CONSTRAINT admin_ibfk_4 FOREIGN KEY (donor_ID) REFERENCES donor (DonorID),
  ADD CONSTRAINT admin_ibfk_5 FOREIGN KEY (feedback_ID) REFERENCES feedback (FeedbackID),
  ADD CONSTRAINT admin_ibfk_6 FOREIGN KEY (Act_ID) REFERENCES activity (ActivityID),
  ADD CONSTRAINT admin_ibfk_7 FOREIGN KEY (newsID) REFERENCES news (newsID);

ALTER TABLE donor
  ADD CONSTRAINT donor_ibfk_1 FOREIGN KEY (vol_ID) REFERENCES volunteer (VolunteerID);

ALTER TABLE feedback
  ADD CONSTRAINT feedback_ibfk_1 FOREIGN KEY (vol_ID) REFERENCES volunteer (VolunteerID),
  ADD CONSTRAINT feedback_ibfk_2 FOREIGN KEY (receiver_ID) REFERENCES receiver (ReceiverID);

ALTER TABLE report
  ADD CONSTRAINT report_ibfk_1 FOREIGN KEY (receiver_ID) REFERENCES receiver (ReceiverID),
  ADD CONSTRAINT report_ibfk_2 FOREIGN KEY (vol_ID) REFERENCES volunteer (VolunteerID);